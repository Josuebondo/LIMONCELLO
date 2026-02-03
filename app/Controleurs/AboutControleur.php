<?php

namespace App\Controleurs;

use App\BaseControleur;
use App\Modeles\About;

/**
 * AboutControleur Contrôleur
 */
class AboutControleur extends BaseControleur
{
    /**
     * Afficher la liste
     */
    public function index()
    {
        // $about = About::tout();
        return vue('about.index');
    }

    /**
     * Afficher le formulaire de création
     */
    public function creer()
    {
        return vue('about.creer');
    }
    public  function contact()
    {
        return vue('about.contact');
    }

    /**
     * Enregistrer un nouvel élément
     */
    public function enregistrer()
    {
        $about = About::creer([
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
        $about = About::trouver($id);

        if (!$about) {
            return redirection('/404');
        }

        return vue('about.editer', ['item' => $about]);
    }

    /**
     * Mettre à jour un élément
     */
    public function mettreAJour()
    {
        $id = $this->requete()->param('id');
        $about = About::trouver($id);

        if (!$about) {
            return redirection('/404');
        }

        $about->mettreAJour([
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
    //     About::supprimer($id);
    //     return redirection('/');
    // }
}
