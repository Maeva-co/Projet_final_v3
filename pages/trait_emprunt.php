<?php
    session_start();

    include ('../inc/connexion.php'); 
    include ('../inc/function.php');

    $id_objet = $_GET['id'];

    $nbr_jour = $_POST['nbr'];
    

    $retour = calcul_date_retour($nbr_jour);
    $date = '2025-07-14';
    emprunter($base, $id_objet, $_SESSION['user_id'], $date, $nbr);


    header('Location:home.php');
?>