<?php
    require_once 'fonctions/fonction_global.php';
    require_once 'fonctions/fonction_topic.php';
    $connexionbdd = connexionbdd();

    $requete_rang = "SELECT * FROM confidentialite";
    $query_rang = mysqli_query($connexionbdd, $requete_rang);
    $rang = mysqli_fetch_all($query_rang, MYSQLI_ASSOC);
                                              
            if(isset($_SESSION["id_confidentialite"]) && ($_SESSION["id_confidentialite"]==3 || $_SESSION["id_confidentialite"]==4))
            //Est-ce qu'il y'a mieux à faire pour check rang de l'utilisateur ?
                {                                     
                    //REQUETE VERSION ADMIN/MODO                    
                    $requete_topic = "SELECT * FROM utilisateurs INNER JOIN topics ON topics.id_utilisateur=utilisateurs.id";
                  
                    if(isset($_POST["ajout_topic"]) && !empty($_POST["titre"]) && !empty($_POST["description"]))
                        {
                           
                            //initialisation des variables
                            $titre = addslashes($_POST["titre"]);
                            $description = addslashes($_POST["description"]);
                            $id_rang = $_POST["acces"];
                            $id_user = $_SESSION["id"];

                            //Insertion du nouveau topic
                           $ajout_topic = "INSERT INTO topics (id_utilisateur, titre, description, id_confidentialite) VALUES ($id_user, '$titre', '$description', $id_rang)";
                           $query_ajout_topic = mysqli_query($connexionbdd, $ajout_topic);
                        }                             
                }
            else if(isset($_SESSION["id_confidentialite"]) && $_SESSION["id_confidentialite"]==2)
                {                                                                            
                    //REQUETE VERSION MEMBRE
                    $requete_topic = "SELECT * FROM utilisateurs INNER JOIN topics ON topics.id_utilisateur=utilisateurs.id WHERE topics.id_confidentialite=1 OR topics.id_confidentialite=2";                                          
                }
            else 
                {                                     
                    //REQUETE VERSION PUBLIC
                    $requete_topic = "SELECT * FROM utilisateurs INNER JOIN topics ON topics.id_utilisateur=utilisateurs.id WHERE topics.id_confidentialite=1";
                }                            
            
    $query_topic = mysqli_query($connexionbdd, $requete_topic);
    $topics= mysqli_fetch_all($query_topic, MYSQLI_ASSOC);     
?>