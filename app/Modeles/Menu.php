<?php

namespace App\Modeles;

use Core\BaseBD;
use Core\Modele;

/**
 * Menu Modèle
 */
class Menu extends Modele
{
    protected string $table = 'menu_items';
    public static function categories(): array
    {

        $query = 'SELECT * FROM categories';
        $stmt = BaseBD::obtenir()->tous($query);
        $result = $stmt;
        return $result ?: [];
    }
}
