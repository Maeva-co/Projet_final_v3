<?php 
function login($base, $mail, $psw) {
    $sql = "SELECT * FROM membre WHERE email = '%s'";
    $sql = sprintf($sql, $mail);
    $result = mysqli_query($base, $sql);
    $res = mysqli_fetch_assoc($result);
    if($res['mot_de_passe'] == $psw) {
        return $res['id_membre'];
    } else {
        return 0;
    }
}

function sign_up($base, $nom, $dtn, $genre, $mail, $ville, $psw) {
    $sql = "INSERT INTO membre(nom, date_de_naissance, genre, email, ville, mot_de_passe, image_profil) VALUES ('%s', '%s', '%s', '%s', '%s', '%s','default')";
    $sql = sprintf($sql, $nom,$dtn,$genre, $mail, $ville, $psw);
    mysqli_query($base, $sql);
}

function get_list_objet ($base)
{
    $sql = "SELECT * FROM objet";
    $result = mysqli_query($base, $sql);
    return $result;
}

function verify_emprunt($base, $id_objet)
{
    $sql = "SELECT * FROM v_current_emprunt WHERE id_objet = '%s'";
    $sql = sprintf($sql, $id_objet);
    $result = mysqli_query($base, $sql);
    $donnees = mysqli_fetch_assoc($result);
    if (empty($donnees))
    {
        return 0;
    }
    else
    {
        return 1;
    }
}

function inserer_objet($base, $nom_objet, $categorie, $id_membre)
{
    $sql = "INSERT INTO objet(nom_objet, id_categorie, id_membre) VALUES ('%s', '%s', '%s')";
    $sql = sprintf($sql, $nom_objet, $categorie, $id_membre);
    mysqli_query($base, $sql);
}

function get_id_objet ($base, $nom_objet)
{
    $sql = "SELECT * FROM objet WHERE mon_objet = '%s'";
    $sql = sprintf($sql, $nom_objet);
    $result = mysqli_query($base, $sql);
    return $result;
}

function inserer_images($base, $id_objet, $name)
{
    $sql = "INSERT INTO images_objet(id_objet, nom_image) VALUES ('%s', '%s')";
    $sql = sprintf($sql, $id_objet, $name);
    mysqli_query($base, $sql);
}

function get_image_objet($base, $id_objet) {
    $sql = "SELECT nom_image FROM v_image_objet WHERE id_objet = '%s'";
    $sql = sprintf($sql, $id_objet);
    $res = mysqli_query($base, $sql);
    $result = mysqli_fetch_assoc($res);
    return $result['nom_image'];
}

function get_object_history($base, $id_membre, $id_objet) {
    $sql = "SELECT * FROM emprunt WHERE id_membre = '%s' AND id_objet = '%s'";
    $sql = sprintf($sql, $id_membre, $id_objet);
    $result = mysqli_query($base, $sql);
    return $result;
}

function get_object_name($base, $id_objet) {
    $sql = "SELECT nom_objet FROM objet WHERE id_objet = '%s'";
    $sql = sprintf($sql, $id_objet);
    $result = mysqli_query($base, $sql);
    $res = mysqli_fetch_assoc($result);
    return $res['nom_objet'];
}

function calcul_date_retour($nbr)
{
    $date = '2025-07-14';
    $retour = $date + $nbr;
    return $retour;
}

function emprunter ($base, $id_objet, $id_membre, $date_emprunt, $date_retour)
{
    $sql = "INSERT INTO emprunt(id_objet, id_membre, date_emprunt, date_retour) VALUES ('%s', '%s', '%s', '%s')";
    $sql = sprintf($sql, $id_objet, $id_membre, $date_emprunt, $date_retour);
    mysqli_query($base, $sql);
}
?>