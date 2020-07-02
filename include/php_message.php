<?php
     require_once 'fonctions/fonction_global.php';
     if(isset($_GET["id_conv"]) && !empty($_GET["id_conv"]))
        {    
            $id_conv = $_GET["id_conv"];

            $connexionbdd = connexionbdd();
            $select_msg =  "SELECT * FROM utilisateurs INNER JOIN messages ON messages.id_utilisateur=utilisateurs.id WHERE id_conversation=$id_conv";
            $query_select_msg = mysqli_query($connexionbdd, $select_msg);
            $messages = mysqli_fetch_all($query_select_msg, MYSQLI_ASSOC);                                     

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