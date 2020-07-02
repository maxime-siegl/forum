<?php    
    session_start();
    require_once '../fonctions/fonction_global.php';

    if(isset($_GET["type"], $_GET["id_msg"]) && !empty($_GET["type"]) && !empty($_GET["id_msg"]))
        {
            $gettype = (int) $_GET["type"];
            $getid_msg = (int) $_GET["id_msg"];
            $id_user = $_SESSION["id"];

            $connexionbdd= connexionbdd();
            $requete_isset_msg = "SELECT id FROM messages WHERE id=$getid_msg";
            $query_isset_msg = mysqli_query($connexionbdd, $requete_isset_msg);
            $isset_msg = mysqli_fetch_all($query_isset_msg);

            if(isset($isset_msg))
                {
                    if($gettype == 1)
                        {
                            $insert_like = "INSERT INTO likes (id_message, id_utilisateur) VALUES ($getid_msg, $id_user)";
                            $query_like = mysqli_query($connexionbdd, $insert_like);                            
                        }
                    else if ($gettype == 2)
                        {
                            $insert_dislike = "INSERT INTO dislikes (id_message, id_utilisateur) VALUES ($getid_msg, $id_user)";
                            $query_dislike = mysqli_query($connexionbdd, $insert_dislike);
                        }
                    else if ($gettype == 3)
                        {
                            $insert_signalement = "INSERT INTO signalements (id_message, id_utilisateur) VALUES ($getid_msg, $id_user)";
                            $query_signalement = mysqli_query($connexionbdd, $insert_signalement);
                        }
                }
            // else    
            //     {
            //         Rediriger vers l'accueil
            //     }
        }
    // else    
            //     {
            //         Rediriger vers l'accueil
            //     }



    
?>