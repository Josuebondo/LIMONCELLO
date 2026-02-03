<?php

namespace App\Controleurs;

use App\BaseControleur;
use App\Modeles\panier;
use \Core\Requete;
use \Core\Reponse;
use \Core\Flash;

/**
 * panierControleur Contrôleur
 */
class panierControleur extends BaseControleur
{
    /**
     * Afficher la liste
     */
    public function index()
    {
        // $panier = panier::tout();
        return vue('panier.index');
    }
    public function comfirmer()
    {
        // $panier = panier::tout();
        return vue('panier.confirme');
    }
    public  function finaliser()
    {
        // $panier = panier::tout();
        return vue('panier.finaliser');
    }

    /**
     * Afficher le formulaire de création
     */
    public function creer()
    {
        return vue('panier.creer');
    }

    /**
     * Enregistrer un nouvel élément
     */
    public function enregistrer()
    {
        $panier = panier::creer([
            'nom' => requette()->publier('nom'),
        ]);

        return redirection('/');
    }

    /**
     * Afficher le formulaire d'édition
     */
    public function editer()
    {
        $id = Requete()->param('id');
        $panier = panier::trouver($id);

        if (!$panier) {
            return redirection('/404');
        }

        return vue('panier.editer', ['item' => $panier]);
    }

    /**
     * Mettre à jour un élément
     */
    public function mettreAJour()
    {
        $id = $this->requette()->param('id');
        $panier = panier::trouver($id);

        if (!$panier) {
            return redirection('/404');
        }

        $panier->mettreAJour([
            'nom' => $this->requette()->publier('nom'),
        ]);

        return redirection('/');
    }

    /**
     * Supprimer un élément
     */
    public function supprimer()
    {
        $id = $this->requette()->param('id');
        panier::supprimer($id);
        return redirection('/');
    }
}
