<?php
session_start();
require_once '../fonctions/fonction_global.php';
$connexionbdd = connexionbdd();
if(isset($_GET, $_SESSION))
    {        
        if(isset($_GET["sup_topic"]))
            {
                $id_sup_topic=$_GET["sup_topic"];
                        
                //requete pour supprimer le topic
                $sup_topic = "DELETE FROM topics WHERE id=$id_sup_topic";
                $query_sup_topic = mysqli_query($connexionbdd, $sup_topic);    

                header("location:../topic.php");  
            }

        if(isset($_GET["sup_conv"]))
            {
                $id_conv=$_GET["sup_conv"];
                //Requete pour récupérer l'id du topic => revenir sur la même page après suppression
                $requete_id_topic = "SELECT id_topic FROM conversations WHERE id=$id_conv";
                $query_id_topic = mysqli_query($connexionbdd, $requete_id_topic);
                $resultat_id_topic = mysqli_fetch_all($query_id_topic, MYSQLI_ASSOC);
                $id_topic = $resultat_id_topic[0]["id_topic"];
                //requete pour supprimer la conversation
                $sup_conv = "DELETE FROM conversations WHERE id=$id_conv";
                $query_sup_conv = mysqli_query($connexionbdd, $sup_conv);    

                header("Location:../conversation.php?id_topic=$id_topic");
            }
        
        if(isset($_GET["sup_message"]))
            {
                $id_sup_msg = $_GET["sup_message"];                
                $id_conv = $_GET["id_conv"];

                $sup_msg = "DELETE FROM messages WHERE id=$id_sup_msg";
                $query_sup_msg = mysqli_query($connexionbdd, $sup_msg);

                header("Location:../messages.php?id_conv=$id_conv");
            }
    }
else
    {       
        header("location:../index.php");
    }


?>

