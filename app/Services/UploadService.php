<?php

namespace App\Services;

/**
 * Service d'Upload de Fichiers
 * Gère les uploads sécurisés
 */
class UploadService
{
    private string $repertoireUpload;
    private array $extensionsAutorisees;
    private int $tailleMaxMo;

    public function __construct()
    {
        // Charger les configurations depuis .env
        $this->repertoireUpload = env('REPERTOIRE_UPLOAD', __DIR__ . '/../../public/uploads/');
        $this->tailleMaxMo = (int) env('TAILLE_MAX_UPLOAD', 5);

        $extensionsStr = env('EXTENSIONS_AUTORISEES', 'jpg,jpeg,png,gif,pdf');
        $this->extensionsAutorisees = array_map('trim', explode(',', $extensionsStr));
    }

    /**
     * Upload un fichier dans le dossier stockage/ et retourne le chemin relatif
     * @param array $file $_FILES['...']
     * @param string $subdir Sous-dossier dans stockage/ (optionnel)
     * @return string|null Chemin relatif ou null en cas d'erreur
     */
    public function uploadDansStockage(array $file, string $subdir = ''): ?string
    {
        if (!isset($file['tmp_name']) || !is_uploaded_file($file['tmp_name'])) {
            return null;
        }
        $baseDir = dirname(__DIR__, 2) . '/stockage';
        if ($subdir) {
            $baseDir .= '/' . trim($subdir, '/');
        }
        if (!is_dir($baseDir)) {
            mkdir($baseDir, 0775, true);
        }
        $filename = uniqid('file_', true) . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '', basename($file['name']));
        $dest = $baseDir . '/' . $filename;
        if (move_uploaded_file($file['tmp_name'], $dest)) {
            // Retourne le chemin relatif depuis la racine du projet
            $rel = 'stockage' . ($subdir ? '/' . trim($subdir, '/') : '') . '/' . $filename;
            return $rel;
        }
        return null;
    }


    /**
     * Définit le répertoire d'upload
     */
    public function setRepertoire(string $repertoire): self
    {
        $this->repertoireUpload = $repertoire;
        return $this;
    }

    /**
     * Définit les extensions autorisées
     */
    public function setExtensionsAutorisees(array $extensions): self
    {
        $this->extensionsAutorisees = $extensions;
        return $this;
    }

    /**
     * Définit la taille max en Mo
     */
    public function setTailleMax(int $mo): self
    {
        $this->tailleMaxMo = $mo;
        return $this;
    }

    /**
     * Upload un fichier
     */
    public function uploader(array $fichier): ?string
    {
        // Validation
        if (!$this->validerFichier($fichier)) {
            return null;
        }

        // Crée le dossier s'il n'existe pas
        if (!is_dir($this->repertoireUpload)) {
            mkdir($this->repertoireUpload, 0755, true);
        }

        // Génère un nom unique
        $extension = pathinfo($fichier['name'], PATHINFO_EXTENSION);
        $nomFichier = uniqid('upload_') . '.' . $extension;
        $cheminComplet = $this->repertoireUpload . $nomFichier;

        // Déplace le fichier
        if (move_uploaded_file($fichier['tmp_name'], $cheminComplet)) {
            return $nomFichier;
        }

        return null;
    }

    /**
     * Valide un fichier
     */
    private function validerFichier(array $fichier): bool
    {
        // Vérifier les erreurs d'upload
        if ($fichier['error'] !== UPLOAD_ERR_OK) {
            return false;
        }

        // Vérifier la taille
        if ($fichier['size'] > ($this->tailleMaxMo * 1024 * 1024)) {
            return false;
        }

        // Vérifier l'extension
        $extension = strtolower(pathinfo($fichier['name'], PATHINFO_EXTENSION));
        if (!in_array($extension, $this->extensionsAutorisees)) {
            return false;
        }

        return true;
    }

    /**
     * Supprime un fichier
     */
    public function supprimer(string $nomFichier): bool
    {
        $chemin = $this->repertoireUpload . $nomFichier;

        if (file_exists($chemin)) {
            return unlink($chemin);
        }

        return false;
    }
}
