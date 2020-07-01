<?php
    // avatar + login + rang
    if (isset($_GET['id_posteur']) && !empty($_GET['id_posteur']))
    {
        $id_posteur = $_GET['id_posteur'];

        //echo $info_profil[0]['avatar']; // aficher image avatar
        //echo $info_profil[0]['login']; // afficher le nom log

        $rang_log = "SELECT * FROM confidentialite INNER JOIN utilisateurs ON utilisateurs.id_confidentialite = confidentialite.id WHERE utilisateurs.id = '$id_posteur' ";
        $rang_log_query = mysqli_query($bdd, $rang_log);
        $rang = mysqli_fetch_all($rang_log_query, MYSQLI_ASSOC);

        //echo $rang[0]['rang']; // afficher le rang admin/modo/membre
    }
?>