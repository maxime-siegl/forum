<?php
     require_once 'fonctions/fonction_global.php';
     if(isset($_GET["id_conv"]) && !empty($_GET["id_conv"]))
        {    
            $id_conv = $_GET["id_conv"];

            $connexionbdd = connexionbdd();
            $select_msg =  "SELECT * FROM utilisateurs INNER JOIN messages ON messages.id_utilisateur=utilisateurs.id WHERE id_conversation=$id_conv";
            $query_select_msg = mysqli_query($connexionbdd, $select_msg);
            $messages = mysqli_fetch_all($query_select_msg, MYSQLI_ASSOC);             
            
            //Récupère le titre de la conversation
            $requete_titre_conversation = "SELECT titre FROM conversations WHERE id=$id_conv";
            $query_titre_conversation = mysqli_query($connexionbdd, $requete_titre_conversation);
            $resultat_titre_conversation = mysqli_fetch_all($query_titre_conversation, MYSQLI_ASSOC);
           
            $titre_conversation = $resultat_titre_conversation[0]["titre"];

            //FORMULAIRE AJOUT MESSAGE
            if(isset($_POST["new_msg"]))
                {
                    $new_msg = addslashes($_POST["msg"]);
                    $id = $_SESSION["id"];

                    $connexionbdd = connexionbdd();
                    $requete_insert = "INSERT INTO messages (id_conversation, id_utilisateur, message) VALUES ($id_conv, $id, '$new_msg')";                   
                    $insert_msg = mysqli_query($connexionbdd, $requete_insert);

                    //rajouter header
                }
        }    
    
?>