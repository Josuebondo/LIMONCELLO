<?php

namespace App\Controleurs;

use Core\Requete;
use Core\Reponse;
use App\Modeles\Commande;
use App\Modeles\CommandeItem;
use App\BaseControleur;

/**
 * CommandeAPIControleur Contrôleur
 */
class CommandeAPIControleur extends BaseControleur
{
    // GET /api/commandes
    public function index(Requete $request, Reponse $response)
    {
        // Pagination
        $page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
        $perPage = isset($_GET['perPage']) ? max(1, intval($_GET['perPage'])) : 10;
        $offset = ($page - 1) * $perPage;
        // Utiliser le modèle Commande pour la pagination
        $total = count(Commande::tout());
        $commandes = (new Commande())
            ->selectionner(['*'])
            ->obtenir();
        // Appliquer l'ordre et la pagination manuellement
        usort($commandes, function ($a, $b) {
            $dateA = $a->date ?? '';
            $dateB = $b->date ?? '';
            if ($dateA === $dateB) {
                return ($b->id ?? 0) <=> ($a->id ?? 0);
            }
            return strcmp($dateB, $dateA);
        });
        $commandes = array_slice($commandes, $offset, $perPage);
        $commandeIds = array_map(fn($c) => $c->id, $commandes);
        $items = [];
        if (count($commandeIds) > 0) {
            // Utiliser CommandeItem pour récupérer les items
            $itemRows = \App\Modeles\CommandeItem::trouverParCommandeIds($commandeIds);
            foreach ($itemRows as $i) {
                $items[$i->commande_id][] = $i->enTableau();
            }
        }
        $commandesArray = [];
        foreach ($commandes as $commande) {
            $commandeArr = $commande->enTableau();
            $commandeArr['items'] = $items[$commande->id] ?? [];
            $commandesArray[] = $commandeArr;
        }
        return $response->json([
            'success' => true,
            'data' => $commandesArray,
            'count' => $total
        ]);
    }

    // GET /api/commandes/{id}
    public function show(Requete $request, Reponse $response, $id)
    {
        $commande = Commande::trouver($id);
        if (!$commande) {
            return $response->json(['statut' => 'erreur', 'message' => 'Commande introuvable'], 404);
        }
        return $response->json(['statut' => 'ok', 'data' => $commande->toArray()]);
    }

    // POST /api/commandes
    public function store(Requete $request, Reponse $response)
    {
        try {
            $data = json_decode(file_get_contents('php://input'), true);
            // Vérification CSRF
            $csrfToken = $data['_csrf_token'];
            if (!$csrfToken) {
                $response->json([
                    'success' => false,
                    'error' => 'Token CSRF invalide ou manquant.'
                ], 403);
                return;
            }
            if (!\Core\CSRF::valider($csrfToken)) {
                $response->json([
                    'success' => false,
                    'error' => 'Token CSRF invalide.'
                ], 403);
                return;
            }
            // Validation avec Validateur
            $v = new \Core\Validateur();
            $v->ajouter('nom_client', ['requis']);
            $v->ajouter('telephone', ['requis']);
            $v->ajouter('mode_reception', ['requis']);
            $v->ajouter('montant_total', ['requis']);
            // Ajoute d'autres règles si besoin
            if (!$v->valider($data)) {
                $response->json([
                    'success' => false,
                    'error' => $v->erreurs()
                ], 400);
                return;
            }
            $produits = $data['produits'] ?? [];
            unset($data['produits']);
            unset($data['_csrf_token']);
            // Création de la commande
            $commande = Commande::creer($data);
            $bd = \Core\BaseBD::obtenir();
            $commandeId = $bd->dernierInsertId();
            // Ajout des items
            foreach ($produits as $produit) {
                CommandeItem::creer([
                    'commande_id' => $commandeId,
                    'produit_id' => $produit['id'] ?? null,
                    'nom_produit' => $produit['name'] ?? '',
                    'quantite' => $produit['quantity'] ?? 1,
                    'prix_unitaire' => $produit['price'] ?? 0,
                ]);
            }
            $commandeCree = \App\Modeles\Commande::trouver($commandeId);
            $response->json([
                'success' => true,
                'message' => 'Commande créée avec succès',
                'id' => $commandeId,
                'commande' => $commandeCree ? $commandeCree->toArray() : null,
                'produits' => $produits
            ], 201);
        } catch (\Exception $e) {
            $response->json([
                'success' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // PUT /api/commandes/{id}
    public function update(Requete $request, Reponse $response, $id)
    {
        $commande = Commande::trouver($id);
        if (!$commande) {
            return $response->json(['statut' => 'erreur', 'message' => 'Commande introuvable'], 404);
        }
        $data = $request->tousCorps();
        foreach ($data as $key => $value) {
            $commande->$key = $value;
        }
        $commande->sauvegarder();
        return $response->json(['statut' => 'ok', 'data' => $commande->enTableau()]);
    }

    // DELETE /api/commandes/{id}
    public function destroy(Requete $request, Reponse $response, $id)
    {
        $commande = Commande::trouver($id);
        if (!$commande) {
            return $response->json(['statut' => 'erreur', 'message' => 'Commande introuvable'], 404);
        }
        $commande->supprimer();
        return $response->json(['statut' => 'ok', 'message' => 'Commande supprimée']);
    }
}
