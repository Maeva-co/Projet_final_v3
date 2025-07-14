<?php
    session_start();

    include("../inc/connexion.php");
    include("../inc/function.php");

    $nom_objet = $_POST['nom_objet'];
    $categorie = $_POST['categorie'];

    if ($categorie == 'esthetique')
    {
        $id_categorie = 1;
    }
    if ($categorie == 'bricolage')
    {
        $id_categorie = 2;
    }
    if ($categorie == 'mecanique')
    {
        $id_categorie = 3;
    }
    if ($categorie == 'cuisine')
    {
        $id_categorie = 4;
    }

    $uploadDir = __DIR__ . '/../assets/images/';
    $maxSize = 2 * 1024 * 1024; // 2 Mo
    $allowedMimeTypes = ['image/jpeg', 'image/png'];

    // Vérifie si un fichier est soumis
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['fichier']))
    {
        $file = $_FILES['fichier'];
        if ($file['error'] !== UPLOAD_ERR_OK)
        {
            die('Erreur lors de l’upload : ' . $file['error']);
        }

        // Vérifie la taille
        if ($file['size'] > $maxSize)
        {
            die('Le fichier est trop volumineux.');
        }

        // Vérifie le type MIME avec `finfo`
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mime = finfo_file($finfo, $file['tmp_name']);
        finfo_close($finfo);
        if (!in_array($mime, $allowedMimeTypes)) 
        {
            die('Type de fichier non autorisé : ' . $mime);
        }

        // renommer le fichier
        $originalName = pathinfo($file['name'], PATHINFO_FILENAME);
        $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
        $newName = $originalName . '_' . uniqid() . '.' . $extension;

        // Déplace le fichier
        if (move_uploaded_file($file['tmp_name'], $uploadDir . $newName))
        {
            echo "Fichier uploadé avec succès : ". $newName;
            inserer_objet($base, $nom_objet, $id_categorie, $_SESSION['user_id']);
            $info_objet = get_id_objet($base, $nom_objet);
            inserer_images ($base, $info_objet['id_objet'], $newName);
            header('Location:home.php');
        } 
        else
        {
            echo "Échec du déplacement du fichier.";
        }
    } 
        
    else 
    {
        echo "Aucun fichier reçu.";
    }
?>