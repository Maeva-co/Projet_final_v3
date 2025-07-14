<?php 
session_start();
include ("../inc/connexion.php");
include ("../inc/function.php");
$id_objet = $_GET['id_objet'];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Fiche Objet</title>
    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <style>
        .image-principale {
            max-height: 400px;
            object-fit: cover;
            width: 100%;
        }
        .image-miniature {
            height: 100px;
            object-fit: cover;
            cursor: pointer;
        }
    </style>
</head>
<body class="bg-light">

    <div class="container py-4">
        <div class="text-center mb-4">
            <img src="../assets/images/montre.jpeg" alt="Image principale" class="img-fluid rounded image-principale shadow">
        </div>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Historique des emprunts</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <?php $list = get_object_history($base, $_SESSION['user_id'], $id_objet); ?>
                            <?php while($donnees = mysqli_fetch_assoc($list)){ 
                                $verify = verify_emprunt($base, $donnees['id_objet']);
                                ?>
                            <li class="list-group-item"><?= get_object_name($base, $donnees['id_objet']) ?> - <?= $donnees['date_emprunt']; ?>
                                <?php if($verify != 0){ ?>
                                    <span class="badge bg-danger">En cours d'emprunt</span>
                                <?php } ?>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-secondary text-white">
                        <h5 class="mb-0">Autres images</h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-2">
                            <div class="col-4">
                                <img src="../assets/images/montre.jpeg" alt="Miniature 1" class="img-fluid rounded image-miniature">
                            </div>
                            <div class="col-4">
                                <img src="../assets/images/montre.jpeg" alt="Miniature 2" class="img-fluid rounded image-miniature">
                            </div>
                            <div class="col-4">
                                <img src="../assets/images/montre.jpeg" alt="Miniature 3" class="img-fluid rounded image-miniature">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</body>
</html>
