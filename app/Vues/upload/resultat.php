<!-- Vue pour afficher le résultat de l'upload -->
<?php if (!empty($erreurs)): ?>
    <div class="erreurs">
        <ul>
            <?php foreach ($erreurs as $erreur): ?>
                <li><?= htmlspecialchars($erreur) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php elseif (!empty($chemin)): ?>
    <div class="success">
        <p>Fichier uploadé avec succès !</p>
        <a href="/file/<?= urlencode(basename($chemin)) ?>" target="_blank">Voir le fichier</a>
        <?php if (preg_match('/\.(jpg|jpeg|png)$/i', $chemin)): ?>
            <br>
            <img src="/file/<?= urlencode(basename($chemin)) ?>" alt="Image uploadée" style="max-width:300px;">
        <?php endif; ?>
    </div>
<?php endif; ?>