<!-- Exemple de formulaire HTML pour uploader un fichier -->
<form action="/upload" method="post" enctype="multipart/form-data">
    <label for="fichier">Choisir un fichier :</label>
    <input type="file" name="fichier" id="fichier" accept=".jpg,.jpeg,.png,.pdf" required>
    <button type="submit">Uploader</button>
</form>