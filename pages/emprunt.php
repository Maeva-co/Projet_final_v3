<?php
    session_start();

    include ('../inc/connexion.php'); 
    include ('../inc/function.php');

    if(isset($_GET['id']))
    {
        $id_objet = $_GET['id'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Emprunt</title>
</head>
<body>
    <div class="cadre">
        <form action="trait_emprunt.php?id=<?php echo $id_objet;?>" method="post">
            <h2>Combien de jours voulez vous empruntez cet objet?</h2>
            <input type="number" name="nbr">
            <input type="submit" value="valider">
        </form>
    </div>
</body>
</html>