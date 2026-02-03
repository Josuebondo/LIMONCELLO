<?php

namespace App\Controleurs;

use App\BaseControleur;
use App\Modeles\Menu;

/**
 * MenuControleur Contrôleur
 */
class MenuControleur extends BaseControleur
{
    /**
     * Afficher la liste
     */
    public function index()
    {
        $menu = Menu::tout();
        $categories = Menu::categories();
        // $this->afficher('menu.index', ['menus' => $menu]);
        return vue('menu.index', ['menus' => $menu, 'categories' => $categories]);
    }

    /**
     * Afficher le formulaire de création
     */
    public function creer()
    {
        return vue('menu.creer');
    }

    /**
     * Enregistrer un nouvel élément
     */
    public function enregistrer()
    {
        // Gestion de l'upload d'image
        $nom = $this->requete()->publier('nom');
        $fichierImage = $this->requete()->fichier('image');
        $cheminImage = null;
        if ($fichierImage && $fichierImage['error'] === UPLOAD_ERR_OK) {
            $dossierCible = __DIR__ . '/../../public/images/menu/';
            if (!is_dir($dossierCible)) {
                mkdir($dossierCible, 0777, true);
            }
            $extension = pathinfo($fichierImage['name'], PATHINFO_EXTENSION);
            $nomFichier = uniqid('menu_', true) . '.' . $extension;
            $cheminComplet = $dossierCible . $nomFichier;
            if (move_uploaded_file($fichierImage['tmp_name'], $cheminComplet)) {
                $cheminImage = 'images/menu/' . $nomFichier;
            }
        }
        $menu = Menu::creer([
            'nom' => $nom,
            'image' => $cheminImage,
        ]);
        return redirection('/');
    }

    /**
     * Afficher le formulaire d'édition
     */
    public function editer()
    {
        $id = $this->requete()->param('id');
        $menu = Menu::trouver($id);

        if (!$menu) {
            return redirection('/404');
        }

        return vue('menu.editer', ['item' => $menu]);
    }

    /**
     * Mettre à jour un élément
     */
    public function mettreAJour()
    {
        $id = $this->requete()->param('id');
        $menu = Menu::trouver($id);

        if (!$menu) {
            return redirection('/404');
        }

        $menu->mettreAJour([
            'nom' => $this->requete()->publier('nom'),
        ]);

        return redirection('/');
    }

    /**
     * Supprimer un élément
     */
    // public function supprimer()
    // {
    //     $id = $this->requete()->param('id');
    //     Menu::supprimer($id);
    //     return redirection('/');
    // }
}
