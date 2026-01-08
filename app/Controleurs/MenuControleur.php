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
        // $this->afficher('menu.index', ['menus' => $menu]);
        return vue('menu.index', ['menus' => $menu]);
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
        $menu = Menu::creer([
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
