<?php
    require_once '../fonctions/fonction_global.php';

    if(isset($_GET["id_signalement"]))
        {           
            //INITIALISATION DES VARIABLES
            $id_msg_report = $_GET["id_signalement"];
            $id_user = $_SESSION["id"];

            $connexionbdd= connexionbdd();
            //Requete pour récupérer l'id de la conversation => revenir sur la même page après suppression
            $requete_id_conv = "SELECT id_conversation FROM messages WHERE id=$id_msg_report";
            $query_id_conv = mysqli_query($connexionbdd, $requete_id_conv);
            $resultat_id_conv = mysqli_fetch_all($query_id_conv, MYSQLI_ASSOC);       
            $id_conv = $resultat_id_conv[0]["id_conversation"];

            //test
            $selct = "SELECT signalement FROM interactions WHERE id=$id_msg_report";
            $query = mysqli_query($connexionbdd, $selct);
            $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
            var_dump($result);
           
            //REQUETE MAJ TABLE SIGNALEMENT
            $requete_signalement = "INSERT INTO interactions (id_utilisateur, id_message, signalement) VALUES ($id_user, $id_msg_report, ";
            $update_signalement = mysqli_query($connexionbdd, $requete_signalement);
            //header("location:messages.php?");

            //test
            $test = "SELECT signalement FROM interactions WHERE id=$id_msg_report";
            $query_test = mysqli_query($connexionbdd, $test);
            $result_test = mysqli_fetch_all($query, MYSQLI_ASSOC);
            var_dump($result_test);
        }
?>