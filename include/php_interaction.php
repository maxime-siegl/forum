<?php
    session_start();
    require_once '../fonctions/fonction_global.php';

    if(isset($_GET["id_signalement"]))
        {           
            //INITIALISATION DES VARIABLES
            $id_msg_report = $_GET["id_signalement"];
            $id_user = $_SESSION["id"];

            $connexionbdd= connexionbdd();
            //Requete pour récupérer l'id de la conversation => revenir sur la même page après signalement
            $requete_id_conv = "SELECT id_conversation, id_utilisateur FROM messages WHERE id=$id_msg_report";
            $query_id_conv = mysqli_query($connexionbdd, $requete_id_conv);
            $resultat_id_conv = mysqli_fetch_all($query_id_conv, MYSQLI_ASSOC);       
            $id_conv = $resultat_id_conv[0]["id_conversation"];  
            echo $id_conv = $resultat_id_conv[0]["id_utilisateur"];
        
           
            //REQUETE MAJ TABLE SIGNALEMENT
            //FAIRE EN SORTE QUE L'UTILISATEUR NE SIGNAL QU'UNE FOIS            
            $requete_signalement = "INSERT INTO interactions (id_utilisateur, id_message, signalement) VALUES ($id_user, $id_msg_report, 1)";
            $update_signalement = mysqli_query($connexionbdd, $requete_signalement);
            header("location:../messages.php?id_conv=$id_conv");           
        }
    
    if(isset($_GET["id_like"]))
        {
            echo "like";
        }
    
    if(isset($_GET["id_dislike"]))
        {
            echo "dislike";
        }
?>