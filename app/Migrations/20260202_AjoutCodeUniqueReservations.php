<?php

namespace App\Migrations;

use Core\Migration;

class AjoutCodeUniqueReservations extends Migration
{
    public function vers(): void
    {
        $sql = "ALTER TABLE reservations ADD COLUMN code_unique VARCHAR(16) NOT NULL UNIQUE AFTER id;";
        try {
            $this->connexion->exec($sql);
            echo "[MIGRATION] Ajout colonne code_unique : OK\n";
        } catch (\PDOException $e) {
            echo "[MIGRATION] Erreur SQL : " . $e->getMessage() . "\n";
        }
    }

    public function retour(): void
    {
        $sql = "ALTER TABLE reservations DROP COLUMN code_unique;";
        $this->connexion->exec($sql);
    }
}
