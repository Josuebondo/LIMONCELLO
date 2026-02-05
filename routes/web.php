<?php

/**
 * ======================================================================
 * Routes Web - Framework BMVC Production
 * ======================================================================
 */

use Core\Route;
use Core\Routeur;

// Route accueil
Routeur::obtenir('/', 'AccueilControleur@index');
Routeur::obtenir('/404', 'AccueilControleur@nonFound')->nom('accueil');


// Menu
Routeur::obtenir('/menus', 'MenuControleur@index')->nom('menu');
Routeur::obtenir('/menus/creer', 'MenuControleur@creer')->nom('menu.creer');
Routeur::publier('/menus/creer', 'MenuControleur@enregistrer')->nom('menu.envoyer');
Routeur::obtenir('/menus/{id}/editer', 'MenuControleur@editer')->ou('id', '[0-9]+')->nom('menu.editer');
Routeur::publier('/menus/{id}/editer', 'MenuControleur@mettreAJour')->ou('id', '[0-9]+')->nom('menu.mettre');
Routeur::obtenir('/menus/{id}/supprimer', 'MenuControleur@supprimer')->ou('id', '[0-9]+')->nom('menu.supprimer');
// About
Routeur::obtenir('/apropos', 'AboutControleur@index')->nom('about');
Routeur::obtenir('/contact', 'AboutControleur@contact')->nom('contact');

Routeur::obtenir('/abouts/creer', 'AboutControleur@creer')->nom('about.creer');
Routeur::publier('/abouts/creer', 'AboutControleur@enregistrer')->nom('about.envoyer');
Routeur::obtenir('/abouts/{id}/editer', 'AboutControleur@editer')->ou('id', '[0-9]+')->nom('about.editer');
Routeur::publier('/abouts/{id}/editer', 'AboutControleur@mettreAJour')->ou('id', '[0-9]+')->nom('about.mettre');
Routeur::obtenir('/abouts/{id}/supprimer', 'AboutControleur@supprimer')->ou('id', '[0-9]+')->nom('about.supprimer');
// Gallery
Routeur::obtenir('/gallery', 'GalleryControleur@index')->nom('gallery');
Routeur::obtenir('/gallerys/creer', 'GalleryControleur@creer')->nom('gallery.creer');
Routeur::publier('/gallerys/creer', 'GalleryControleur@enregistrer')->nom('gallery.envoyer');
Routeur::obtenir('/gallerys/{id}/editer', 'GalleryControleur@editer')->ou('id', '[0-9]+')->nom('gallery.editer');
Routeur::publier('/gallerys/{id}/editer', 'GalleryControleur@mettreAJour')->ou('id', '[0-9]+')->nom('gallery.mettre');
Routeur::obtenir('/gallerys/{id}/supprimer', 'GalleryControleur@supprimer')->ou('id', '[0-9]+')->nom('gallery.supprimer');



// Reservation
Routeur::obtenir('/reservation', 'ReservationControleur@index')->nom('reservation');
Routeur::obtenir('/reservations/creer', 'ReservationControleur@creer')->nom('reservation.creer');
Routeur::publier('/reservations/creer', 'ReservationControleur@enregistrer')->nom('reservation.envoyer');
Routeur::obtenir('/reservations/editer/{id}', 'ReservationControleur@editer')->ou('id', '[0-9]+')->nom('reservation.editer');
Routeur::publier('/reservations/editer/{id}', 'ReservationControleur@mettreAJour')->ou('id', '[0-9]+')->nom('reservation.mettre');

Routeur::obtenir('/reservations/{id}/supprimer', 'ReservationControleur@supprimer')->ou('id', '[0-9]+')->nom('reservation.supprimer');
Routeur::obtenir('/reservations/comfirmer', 'ReservationControleur@comfirmer')->nom('reservation.confirmer');
Routeur::obtenir('/reservations/verifier', 'ReservationControleur@verifier')->nom('reservation.verifier');

// Booking confirmation

// Admin 
Routeur::obtenir('/admin/bookings', 'AdminControleur@booking')->nom('admin.booking.index');
Routeur::obtenir('/admin/menu', 'AdminControleur@menu')->nom('admin.menu.index');

// API CRUD Menu Items
Routeur::obtenir('/api/menu-items', 'MenuItemControleur@index');
Routeur::obtenir('/api/menu-items/{id}', 'MenuItemControleur@show')->ou('id', '[0-9]+');
Routeur::publier('/api/menu-items', 'MenuItemControleur@store');
Routeur::publier('/api/menu-items/{id}', 'MenuItemControleur@update')->ou('id', '[0-9]+');
Routeur::supprimer('/api/menu-items/{id}', 'MenuItemControleur@destroy')->ou('id', '[0-9]+');

// API CRUD Reservations
Routeur::obtenir('/api/reservations', 'ReservationAPIControleur@index');
Routeur::obtenir('/api/reservations/{id}', 'ReservationAPIControleur@show')->ou('id', '[0-9]+');
Routeur::obtenir('/api/reservations/code/{code}', 'ReservationAPIControleur@findByCode');
Routeur::publier('/api/reservations', 'ReservationAPIControleur@store');
Routeur::mettre('/api/reservations/{id}', 'ReservationAPIControleur@update')->ou('id', '[0-9]+');
Routeur::patcher('/api/reservations/{id}/annuler', 'ReservationAPIControleur@annuler')->ou('id', '[0-9]+');
Routeur::patcher('/api/reservations/{id}/confirmer', 'ReservationAPIControleur@confirmer')->ou('id', '[0-9]+');
Routeur::supprimer('/api/reservations/{id}', 'ReservationAPIControleur@destroy')->ou('id', '[0-9]+');
Routeur::mettre('/api/reservations/{id}', 'ReservationAPIControleur@update')->ou('id', '[0-9]+');

// Upload de fichiers
Routeur::obtenir('/upload', 'UploadController@formulaire')->nom('upload.formulaire');
Routeur::publier('/upload', 'UploadController@upload')->nom('upload.traitement');
Routeur::obtenir('/file/{filename}', 'UploadController@show')->nom('upload.afficher');
// Affichage des images
Routeur::obtenir('/image', 'Core\ImageController@afficher')->nom('image.afficher');
// Route 404
Routeur::obtenir('/404', 'ErreurControleur@notFound')->nom('erreur.404');
// panier
Routeur::obtenir('/paniers', 'panierControleur@index')->nom('panier');
Routeur::obtenir('/paniers/creer', 'panierControleur@creer')->nom('panier.creer');
Routeur::publier('/paniers/creer', 'panierControleur@enregistrer')->nom('panier.envoyer');
Routeur::obtenir('/paniers/{id}/editer', 'panierControleur@editer')->ou('id', '[0-9]+')->nom('panier.editer');
Routeur::publier('/paniers/{id}/editer', 'panierControleur@mettreAJour')->ou('id', '[0-9]+')->nom('panier.mettre');
Routeur::obtenir('/paniers/{id}/supprimer', 'panierControleur@supprimer')->ou('id', '[0-9]+')->nom('panier.supprimer');

Routeur::obtenir('/paniers/comfirmer', 'panierControleur@comfirmer')->nom('panier.confirmer');
Routeur::obtenir('/paniers/finaliser', 'panierControleur@finaliser')->nom('panier.finaliser');


//API commandes
Routeur::obtenir('/api/commandes', 'CommandeAPIControleur@index');
Routeur::publier('/api/commandes', 'CommandeAPIControleur@store');
Routeur::obtenir('/api/commandes/{id}', 'CommandeAPIControleur@show')->ou('id', '[0-9]+');
Routeur::mettre('/api/commandes/{id}', 'CommandeAPIControleur@update')->ou('id', '[0-9]+');
Routeur::supprimer('/api/commandes/{id}', 'CommandeAPIControleur@destroy')->ou('id', '[0-9]+');
