<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload</title>
    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div class="cadre">
        <h2>Uploadez une/des image(s)</h2>
            <form action="trait_upload.php" method="post" enctype="multipart/form-data">
                <p> Entrez le nom de l'objet: </p>
                <input type="text" name="nom_objet">
                <p> Entrez la categorie de l'objet:</p>
                <input type="text" name="categorie">
                <label for="fichier"> Choisir le(s) image(s) que vous aimeriez ajouter: </label>
                <input type="file" name="fichier" id="fichier" required>
                <br><br>
                <input type="submit" value="Uploader">
            </form>
    </div>
</body>
</html>