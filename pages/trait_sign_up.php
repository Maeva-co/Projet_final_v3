<?php
include ('../inc/connexion.php'); 
include ('../inc/function.php'); 
$nom = $_POST['nom'];
$dtn = $_POST['dtn'];
$mail = $_POST['mail'];
$psw = $_POST['psw'];
$genre = $_POST['genre'];
$ville = $_POST['ville'];

sign_up($base, $nom, $dtn, $genre, $mail, $ville, $psw);
header('Location:../index.php');
?>