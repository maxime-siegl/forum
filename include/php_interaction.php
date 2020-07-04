<?php    
    session_start();
    require_once '../fonctions/fonction_global.php';

    if(isset($_GET["type"], $_GET["id_msg"]) && !empty($_GET["type"]) && !empty($_GET["id_msg"]))
        {
            $gettype = (int) $_GET["type"];
            $getid_msg = (int) $_GET["id_msg"];
            $getidconv = (int) $_GET["id_conv"];
            $id_user = $_SESSION["id"];

            $connexionbdd= connexionbdd();
            $requete_isset_msg = "SELECT id FROM messages WHERE id=$getid_msg";
            $query_isset_msg = mysqli_query($connexionbdd, $requete_isset_msg);
            $isset_msg = mysqli_fetch_all($query_isset_msg);

            if(isset($isset_msg))
                {
                    if($gettype == 1)
                        {
                            $requete_check_likes = "SELECT id FROM likes WHERE id_message=$getid_msg AND id_utilisateur=$id_user";
                            $query_check_likes = mysqli_query($connexionbdd, $requete_check_likes);
                            $check_likes = mysqli_fetch_row($query_check_likes);       
                            
                            //SUPPRIME LE DISLIKE SI L'USER LIKE
                            $delete_dislikes = "DELETE FROM dislikes WHERE id_message=$getid_msg AND id_utilisateur=$id_user";
                            $query_delete_dislikes = mysqli_query($connexionbdd, $delete_dislikes);

                            if(isset($check_likes))
                                {
                                    //SUPPRIME LE LIKE SI L'USER A DEJA LIKE
                                    $delete_likes = "DELETE FROM likes WHERE id_message=$getid_msg AND id_utilisateur=$id_user";
                                    $query_delete_likes = mysqli_query($connexionbdd, $delete_likes);
                                }
                            else    
                                {                                    
                                    $insert_like = "INSERT INTO likes (id_message, id_utilisateur) VALUES ($getid_msg, $id_user)";
                                    $query_like = mysqli_query($connexionbdd, $insert_like);                                    
                                }                                                
                        }
                    else if ($gettype == 2)
                        {
                            $requete_check_dislikes = "SELECT id FROM dislikes WHERE id_message=$getid_msg AND id_utilisateur=$id_user";
                            $query_check_dislikes = mysqli_query($connexionbdd, $requete_check_dislikes);
                            $check_dislikes = mysqli_fetch_row($query_check_dislikes);

                            //SUPPRIME LE LIKE SI L'USER DISLIKE
                            $delete_likes = "DELETE FROM likes WHERE id_message=$getid_msg AND id_utilisateur=$id_user";
                            $query_delete_likes = mysqli_query($connexionbdd, $delete_likes);   

                            if(isset($check_dislikes))
                                {
                                    $delete_dislikes = "DELETE FROM dislikes WHERE id_message=$getid_msg AND id_utilisateur=$id_user";
                                    $query_delete_dislikes = mysqli_query($connexionbdd, $delete_dislikes);
                                }
                            else
                                {
                                    $insert_dislike = "INSERT INTO dislikes (id_message, id_utilisateur) VALUES ($getid_msg, $id_user)";
                                    $query_dislike = mysqli_query($connexionbdd, $insert_dislike);                                    
                                }
                            
                        }
                    else if ($gettype == 3)//A revoir
                        {
                            
                            $requete_check_signalements = "SELECT id FROM signalements WHERE id_message=$getid_msg AND id_utilisateur=$id_user";
                            $query_check_signalements = mysqli_query($connexionbdd, $requete_check_signalements);
                            $check_signalements = mysqli_fetch_row($query_check_signalements);                            

                            if(!isset($check_signalements))
                                {            
                                    $requete_id_posteur = "SELECT utilisateurs.id FROM utilisateurs INNER JOIN messages ON messages.id_utilisateur=utilisateurs.id WHERE messages.id=$getid_msg";
                                    $query_id_posteur = mysqli_query($connexionbdd, $requete_id_posteur);
                                    $resultat_id_posteur = mysqli_fetch_row($query_id_posteur);
                                    var_dump($resultat_id_posteur);
                                    
                                    $id_posteur = $resultat_id_posteur[0];
                                   
                                    $insert_signalement = "INSERT INTO signalements (id_message, id_utilisateur) VALUES ($getid_msg, $id_posteur)";
                                    $query_signalement = mysqli_query($connexionbdd, $insert_signalement); 
                                }                                                                                                         
                        }
                     header("location:../messages.php?id_conv=$getidconv");
                }  
            else
                {
                    header("location:../messages.php?id_conv=$getidconv");
                } 
        }   
    else    
        {
            header("location:../messages.php?id_conv=$getidconv");
        }          
?>