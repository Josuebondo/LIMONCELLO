<?php

namespace App\Controleurs;

use App\BaseControleur;
use App\Modeles\Gallery;

/**
 * GalleryControleur Contrôleur
 */
class GalleryControleur extends BaseControleur
{
    /**
     * Afficher la liste
     */
    public function index()
    {
        $gallery = Gallery::tout();
        // echo '<pre>';
        // print_r($gallery);
        // exit;
        return $this->rendre('gallery.index', ['items' => $gallery]);
    }

    /**
     * Afficher le formulaire de création
     */
    public function creer()
    {
        return vue('gallery.creer');
    }

    /**
     * Enregistrer un nouvel élément
     */
    public function enregistrer()
    {
        $gallery = Gallery::creer([
            'nom' => $this->requete()->publier('nom'),
        ]);

        return redirection('/');
    }

    /**
     * Afficher le formulaire d'édition
     */
    public function editer()
    {
        $id = $this->requete()->param('id');
        $gallery = Gallery::trouver($id);

        if (!$gallery) {
            return redirection('/404');
        }

        return vue('gallery.editer', ['item' => $gallery]);
    }

    /**
     * Mettre à jour un élément
     */
    public function mettreAJour()
    {
        $id = $this->requete()->param('id');
        $gallery = Gallery::trouver($id);

        if (!$gallery) {
            return redirection('/404');
        }

        $gallery->mettreAJour([
            'nom' => $this->requete()->publier('nom'),
        ]);

        return redirection('/');
    }

    /**
     * Supprimer un élément
     */
    public function supprimer()
    {
        $id = $this->requete()->param('id');
        Gallery::trouver($id)->supprimer();
        return redirection('/');
    }
}
