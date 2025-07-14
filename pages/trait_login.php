<?php
session_start();

include "../inc/connexion.php";
include "../inc/function.php"; 
$mail = $_POST['email'];
$psw = $_POST['psw'];
$indice = login($base, $mail, $psw);
if($indice != 0) {
    $_SESSION['user_id'] = $indice;
    header('Location:home.php');
} else {
    header('Location:../index.php');
}
?>