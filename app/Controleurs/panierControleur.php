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
}
