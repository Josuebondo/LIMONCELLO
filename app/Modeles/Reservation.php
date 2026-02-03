<?php

namespace App\Modeles;

use Core\Modele;
use \Core\BaseBD;

/**
 * Reservation Modèle
 */
class Reservation extends Modele
{
    protected string $table = 'reservations';

    // Génère un code unique non utilisé
    public static function genererCodeUnique($length = 8): string
    {
        $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $db = BaseBD::obtenir();
        $instance = new static();
        do {
            $code = '';
            for ($i = 0; $i < $length; $i++) {
                $code .= $chars[random_int(0, strlen($chars) - 1)];
            }
            $sql = "SELECT * FROM {$instance->table} WHERE code_unique = ? LIMIT 1";
            $existe = $db->une($sql, [$code]);
        } while ($existe);
        return $code;
    }

    // Recherche une réservation par code_unique
    public static function trouverParCode(string $code)
    {
        $instance = new static();
        $sql = "SELECT * FROM {$instance->table} WHERE code_unique = ? LIMIT 1";
        $db = BaseBD::obtenir();
        return $db->une($sql, [$code]);
    }
}
