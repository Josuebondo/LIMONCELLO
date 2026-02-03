<?php

namespace App\Controleurs;

use App\BaseControleur;
use Core\Requete;
use Core\Reponse;
use App\Modeles\Menu;
use App\Modeles\Reservation;

/**
 * AdminControleur Contrôleur
 */
class AdminControleur extends BaseControleur
{
    /**
     * Exemple d'action
     */
    public function index(Requete $request, Reponse $response): string
    {
        return vue('admin.booking.index');
    }
    public function booking(Requete $request, Reponse $response): string

    {
        $reservation = Reservation::tout();
        // dd($reservation);
        return vue('admin.booking.index', ['items' => $reservation]);
    }
    public function menu(Requete $request, Reponse $response): string
    {
        $categories = Menu::categories();
        return vue('admin.menu.index', ['categories' => $categories]);
    }
}
