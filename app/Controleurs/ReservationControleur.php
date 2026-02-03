<?php

namespace App\Controleurs;

use App\BaseControleur;
use App\Modeles\Reservation;
use \Core\Requete;
use \Core\Reponse;
use \Core\Flash;

/**
 * ReservationControleur Contrôleur
 */
class ReservationControleur extends BaseControleur
{
    /**
     * Afficher la liste
     */
    public function index()
    {
        $reservation = Reservation::tout();
        return vue('reservation.index', ['items' => $reservation]);
    }
    public function comfirmer()
    {
        $reservation = Reservation::tout();
        return vue('reservation.confirme', ['items' => $reservation]);
    }

    /**
     * Afficher le formulaire de création
     */
    public function creer()
    {
        return vue('reservation.creer');
    }

    /**
     * Enregistrer un nouvel élément
     */
    public function enregistrer()
    {
        $reservation = Reservation::creer([
            'nom' => $this->requete()->publier('nom'),
        ]);

        return redirection('/');
    }

    /**
     * Afficher le formulaire d'édition
     */
    public function editer($id = null)
    {
        $reservation = Reservation::trouver($id)->enTableau();
        //dd($reservation);
        if (!$reservation) {
            return redirection('/404');
        }
        return vue('reservation.modifier', ['item' => $reservation]);
    }

    /**
     * Mettre à jour un élément
     */
    public function mettreAJour($id = null)
    {

        $reservation = Reservation::trouver($id);

        if (!$reservation) {
            return redirection('/404');
        }

        dd($reservation->enTableau());

        return redirection('/');
    }

    /**
     * Supprimer un élément
     */
    public function supprimer()
    {
        $id = $this->requete()->param('id');
        // Reservation::supprimer();
        return redirection('/');
    }
    public function verifier()
    {
        return vue('reservation.verifier');
    }
    public function modifier(Requete $requete, Reponse $reponse)
    {
        $id = $requete->param('id');
        if (!$id || !is_numeric($id)) {
            // Message d'erreur explicite
            \Core\Flash::ajouter(\Core\Flash::ERREUR, "Aucun identifiant de réservation fourni ou identifiant invalide.");
            return redirection('/404');
        }
        $reservation = Reservation::trouver($id);
        if (!$reservation) {
            \Core\Flash::ajouter(\Core\Flash::ERREUR, "Réservation introuvable pour l'identifiant fourni.");
            return redirection('/404');
        }
        return vue('reservation.modifier', ['reservation' => $reservation]);
    }
}
