<?php
// Formulaire d'ajout de menu avec upload d'image
?>
<form action="/menu/enregistrer" method="post" enctype="multipart/form-data">
    <label for="nom">Nom du menu :</label>
    <input type="text" name="nom" id="nom" required>
    <br>
    <label for="image">Image :</label>
    <input type="file" name="image" id="image" accept="image/*" required>
    <br>
    <button type="submit">Ajouter</button>
</form>