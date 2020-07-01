<?php
    require_once 'fonctions/fonction_global.php';
    
    $bdd = connexionbdd();
    if (isset($_GET['id_posteur']) && !empty($_GET['id_posteur']))
    {
        $id_posteur = $_GET['id_posteur'];
        // recup toutes infos de l'id de l'utilisateur
        $profil = "SELECT * FROM utilisateurs WHERE id = '$id_posteur' ";
        $profil_query = mysqli_query($bdd, $profil);
        $info_profil = mysqli_fetch_all($profil_query, MYSQLI_ASSOC);

        // recup toutes les conv de l'id utilisateur
        $conv = "SELECT * FROM conversations WHERE id_utilisateur = '$id_posteur' ";
        $conv_query = mysqli_query($bdd, $conv);
        $info_conv = mysqli_fetch_all($conv_query, MYSQLI_ASSOC);

        // recup tous les messages de l'id utilisateur
        $mess = "SELECT * FROM messages WHERE id_utilisateur = '$id_posteur' ";
        $mess_query = mysqli_query($bdd, $mess);
        $info_mess = mysqli_fetch_all($mess_query, MYSQLI_ASSOC);

        // var_dump($info_profil);
        // var_dump($info_conv);
        // var_dump($info_mess);
    }
?>