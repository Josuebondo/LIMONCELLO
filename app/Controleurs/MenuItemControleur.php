<?php

namespace App\Controleurs;

use App\BaseControleur;
use Core\Reponse;
use Core\Requete;
use Core\BaseBD;
use Core\Storage\StorageManager;
use App\Modeles\Menu;

class MenuItemControleur extends BaseControleur
{
    /**
     * GET /api/menu-items
     * Récupère tous les articles du menu avec filtrage optionnel
     */
    public function index(Requete $request, Reponse $response)
    {
        try {
            $categoryId = $request->obtenir('category_id');
            $query = new Menu();
            // Jointure pour récupérer le nom de la catégorie (table 'categories', colonne 'name')
            $query = $query->joindreGauche('categories', 'menu_items.category_id', 'categories.id', '=')
                ->selectionner(['menu_items.*', 'categories.name AS category_name']);
            if ($categoryId) {
                $query = $query->et('menu_items.category_id', $categoryId);
            }
            $items = $query->obtenir();
            // Ajouter l'URL complète de l'image, le nom de la catégorie et les ingrédients pour chaque article
            $bd = \Core\BaseBD::obtenir();
            $items = array_map(function ($item) use ($bd) {
                $arr = $item->enTableau();
                $arr['image_url'] = menu_image_url($arr['image'] ?? null);
                // Ajout des ingrédients (tags)
                $ingredients = $bd->tous("SELECT name FROM menu_ingredients WHERE menu_id = ?", [$arr['id']]);
                $arr['ingredients'] = array_column($ingredients, 'name');
                return $arr;
            }, $items);
            $this->json([
                'success' => true,
                'data' => $items,
                'count' => count($items)
            ]);
        } catch (\Exception $e) {
            $this->json([
                'success' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * GET /api/menu-items/{id}
     * Récupère un article spécifique
     */
    public function show($id, Requete $request, Reponse $response)
    {
        try {
            $item = \App\Modeles\Menu::trouver($id);
            if (!$item) {
                $this->json([
                    'success' => false,
                    'error' => 'Article non trouvé'
                ], 404);
                return;
            }
            $arr = $item->enTableau();
            $arr['image_url'] = menu_image_url($arr['image'] ?? null);
            // Lecture des ingrédients liés
            $bd = \Core\BaseBD::obtenir();
            $ingredients = $bd->tous("SELECT name FROM menu_ingredients WHERE menu_id = ?", [$item->id]);
            $arr['ingredients'] = array_column($ingredients, 'name');
            $this->json([
                'success' => true,
                'data' => $arr
            ]);
        } catch (\Exception $e) {
            $this->json([
                'success' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * POST /api/menu-items
     * Crée un nouvel article avec upload de photo
     */
    public function store(Requete $request, Reponse $response)
    {
        try {
            $donnees = $request->tous();
            // Correction : récupérer les ingrédients depuis 'tags' si 'ingredients' absent
            if (empty($donnees['ingredients']) && !empty($donnees['tags'])) {
                $decoded = json_decode($donnees['tags'], true);
                if (is_array($decoded)) {
                    $donnees['ingredients'] = $decoded;
                }
            }
            $validateur = new \Core\Validateur();
            $validateur->ajouter('name', ['requis', 'min:2']);
            $validateur->ajouter('category_id', ['requis', 'entier']);
            $validateur->ajouter('price', ['requis', 'nombre']);
            $validateur->ajouter('description', ['max:500']);
            // Ajoutez d'autres règles si besoin

            if (!$validateur->valider($donnees)) {
                $this->json([
                    'success' => false,
                    'errors' => $validateur->erreurs()
                ], 422);
                return;
            }

            // Gestion de l'upload de l'image via le service
            $imagePath = null;
            $uploadService = new \App\Services\UploadService();
            if ($request->fichier('photo')) {
                $imagePath = $uploadService->uploadDansStockage($request->fichier('photo'), 'menu');
                if (!$imagePath) {
                    $this->json([
                        'success' => false,
                        'error' => 'Erreur lors de l\'upload du fichier.'
                    ], 400);
                    return;
                }
            }

            // Création via le modèle
            $menu = \App\Modeles\Menu::creer([
                'category_id' => $donnees['category_id'],
                'name' => $donnees['name'],
                'description' => $donnees['description'] ?? null,
                'price' => $donnees['price'],
                'image' => $imagePath,
                'is_popular' => !empty($donnees['is_popular']) ? 1 : 0,
                'is_available' => !empty($donnees['is_available']) ? 1 : 0
            ]);

            // Ajout des ingrédients (tags)
            if (!empty($donnees['ingredients']) && is_array($donnees['ingredients'])) {
                $bd = \Core\BaseBD::obtenir();
                foreach ($donnees['ingredients'] as $ingredient) {
                    $bd->executer(
                        "INSERT INTO menu_ingredients (menu_id, name) VALUES (?, ?)",
                        [$menu->id, $ingredient]
                    );
                }
            }

            $this->json([
                'success' => true,
                'message' => 'Article créé avec succès',
                'id' => $menu->id,
                'data' => $menu->enTableau()
            ], 201);
        } catch (\Exception $e) {
            $this->json([
                'success' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * PUT /api/menu-items/{id}
     * Modifie un article existant
     */
    public function update($id, Requete $request, Reponse $response)
    {
        try {
            $data = $request->tous();
            // Si aucune donnée n'est trouvée (cas PUT JSON), lire le corps brut
            if (empty($data)) {
                $data = json_decode(file_get_contents('php://input'), true);
            }

            $menu = Menu::trouver($id);
            if (!$menu) {
                $response->json([
                    'success' => false,
                    'error' => 'Article non trouvé'
                ], 404);
                return;
            }

            $allowedFields = ['category_id', 'name', 'description', 'price', 'is_popular', 'is_available'];
            $updated = false;
            foreach ($allowedFields as $field) {
                if (isset($data[$field])) {
                    $menu->$field = $data[$field];
                    $updated = true;
                }
            }

            // Gestion de l'upload d'une nouvelle image
            $uploadService = new \App\Services\UploadService();
            $nouvelleImage = $request->fichier('photo');
            if ($nouvelleImage) {
                // Supprimer l'ancienne image si elle existe
                if (!empty($menu->image) && \Core\Storage\StorageManager::existe($menu->image)) {
                    \Core\Storage\StorageManager::supprimer($menu->image);
                }
                $imagePath = $uploadService->uploadDansStockage($nouvelleImage, 'menu');
                if (!$imagePath) {
                    $response->json([
                        'success' => false,
                        'error' => "Erreur lors de l'upload du fichier."
                    ], 400);
                    return;
                }
                $menu->image = $imagePath;
                $updated = true;
            }

            // Gestion des ingrédients (remplacement complet)
            if (isset($data['ingredients'])) {
                $ingredients = $data['ingredients'];
                if (is_string($ingredients)) {
                    $decoded = json_decode($ingredients, true);
                    if (is_array($decoded)) {
                        $ingredients = $decoded;
                    }
                }
                if (is_array($ingredients)) {
                    $bd = \Core\BaseBD::obtenir();
                    // Supprimer les anciens ingrédients
                    $bd->executer("DELETE FROM menu_ingredients WHERE menu_id = ?", [$menu->id]);
                    // Ajouter les nouveaux
                    foreach ($ingredients as $ingredient) {
                        $bd->executer(
                            "INSERT INTO menu_ingredients (menu_id, name) VALUES (?, ?)",
                            [$menu->id, $ingredient]
                        );
                    }
                    $updated = true;
                }
            }

            if (!$updated) {
                $response->json([
                    'success' => false,
                    'error' => 'Aucun champ à mettre à jour'
                ], 400);
                return;
            }
            $menu->sauvegarder();
            $response->json([
                'success' => true,
                'message' => 'Article mis à jour avec succès',
                'data' => $menu->enTableau()
            ]);
        } catch (\Exception $e) {
            $response->json([
                'success' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * DELETE /api/menu-items/{id}
     * Supprime un article
     */
    public function destroy($id, Requete $request, Reponse $response)
    {
        try {
            $menu = Menu::trouver($id);
            if (!$menu) {
                $response->json([
                    'success' => false,
                    'error' => 'Article non trouvé'
                ], 404);
                return;
            }
            // Supprimer l'image si elle existe
            if (!empty($menu->image) && StorageManager::existe($menu->image)) {
                StorageManager::supprimer($menu->image);
            }
            $menu->supprimer();
            $response->json([
                'success' => true,
                'message' => 'Article supprimé avec succès'
            ]);
        } catch (\Exception $e) {
            $response->json([
                'success' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
