<?php

namespace App\Modeles;

use Core\Modele;

class CommandeItem extends Modele

{
    protected string $table = 'commande_items';
    protected string $primaryKey = 'id';
    protected array $fillable = [
        'commande_id',
        'produit_id',
        'nom_produit',
        'quantite',
        'prix_unitaire',
    ];

    /**
     * Récupère tous les items par une liste d'IDs de commande
     */
    public static function trouverParCommandeIds(array $ids): array
    {
        if (empty($ids)) return [];
        $instance = new static();
        $inClause = implode(',', array_fill(0, count($ids), '?'));
        $sql = "SELECT * FROM {$instance->table} WHERE commande_id IN ($inClause)";
        $resultats = $instance->bd->tous($sql, $ids);
        return array_map(function ($donnees) {
            $modele = new static();
            $modele->donnees = $donnees;
            $modele->existe = true;
            return $modele;
        }, $resultats);
    }
}
