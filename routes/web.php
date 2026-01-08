<?php

/**
 * ======================================================================
 * Routes Web - Framework BMVC Production
 * ======================================================================
 */

use Core\Routeur;

// Route accueil
Routeur::obtenir('/', 'AccueilControleur@index');


// Menu
Routeur::obtenir('/menus', 'MenuControleur@index')->nom('menu');
Routeur::obtenir('/menus/creer', 'MenuControleur@creer')->nom('menu.creer');
Routeur::publier('/menus/creer', 'MenuControleur@enregistrer')->nom('menu.envoyer');
Routeur::obtenir('/menus/{id}/editer', 'MenuControleur@editer')->ou('id', '[0-9]+')->nom('menu.editer');
Routeur::publier('/menus/{id}/editer', 'MenuControleur@mettreAJour')->ou('id', '[0-9]+')->nom('menu.mettre');
Routeur::obtenir('/menus/{id}/supprimer', 'MenuControleur@supprimer')->ou('id', '[0-9]+')->nom('menu.supprimer');
