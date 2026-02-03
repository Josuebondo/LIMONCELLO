<?php

namespace App\Controleurs;

use App\BaseControleur;

class AccueilControleur extends BaseControleur
{
    public function index()
    {
        //echo 'depuis AccueilControleur index';

        $this->afficher('accueil', [
            'titre' => 'Bienvenue sur BMVC',
            'message' => 'Framework PHP MVC prêt pour la production'
        ]);
    }
    public function nonFound()
    {
        $this->afficher('404', [
            'titre' => 'Page non trouvée',
        ]);
    }
}
