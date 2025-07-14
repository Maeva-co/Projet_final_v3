<?php
    include ('../inc/connexion.php'); 
    include ('../inc/function.php');

    $result = get_list_objet($base);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</head>
<body class="bg-light">

    <div class="container py-5">
        <h1 class="text-center mb-5">Liste des objets</h1>

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            <?php while ($donnees = mysqli_fetch_assoc($result)) { ?>
                <div class="col">
                    <a href="fiche_objet.php?id_objet=<?= $donnees['id_objet']; ?>">
                        <div class="card h-100 shadow-sm">
                            <img src="../assets/images/<?php echo get_image_objet($base, $donnees['id_objet']); ?>"
                                class="card-img-top" style="height: 200px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $donnees['nom_objet']; ?></h5>
                                <?php
                                $emprunt = verify_emprunt($base, $donnees['id_objet']);
                                if ($emprunt != 0) {
                                    echo '<span class="badge bg-danger">En cours d\'emprunt</span>';
                                }
                                ?>
                            </div>
                        </div>
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>

    <h2><a href="upload.php">Ajouter un objet</a></h2>
</body>
</html>