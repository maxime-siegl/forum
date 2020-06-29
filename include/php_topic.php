<?php
    require_once 'fonctions/fonction_global.php';
    require_once 'fonctions/fonction_topic.php';
    $connexionbdd = connexionbdd();

    //Va chercher tous les rôles de bdd
    $requete_rang = "SELECT * FROM confidentialite";
    $query_rang = mysqli_query($connexionbdd, $requete_rang);
    $rang = mysqli_fetch_all($query_rang, MYSQLI_ASSOC);

    foreach($rang as $role => $info_rang)
        {                                   
            if(isset($_SESSION["id_confidentialite"]) && $_SESSION["id_confidentialite"]>=$role)
            //Est-ce qu'il y'a mieux à faire pour check rang de l'utilisateur ?
                {                    
                    //REQUETE VERSION ADMIN/MODO                    
                    $requete_topic = "SELECT * FROM utilisateurs INNER JOIN topics ON topics.id_utilisateur=utilisateurs.id";
                  
                    if(isset($_POST["ajout_topic"]) && !empty($_POST["titre"]) && !empty($_POST["description"]))
                        {
                            //initialisation des variables
                            $titre = $_POST["titre"];
                            $description = $_POST["description"];
                            $id = $_POST["acces"];
                            
                            $ajout_topic = "INSERT INTO topics (id_utilisateur, titre, description, id_confidentialite) VALUES (1, '$titre', '$description', $id)";
                            $query_ajout_topic = mysqli_query($connexionbdd, $ajout_topic);
                        }                             
                }
            else if(isset($_SESSION["id_confidentialite"]) && $_SESSION["id_confidentialite"]<$role)
                {                                                                        
                    //REQUETE VERSION MEMBRE
                    $requete_topic = "SELECT * FROM utilisateurs INNER JOIN topics ON topics.id_utilisateur=utilisateurs.id WHERE topics.id_confidentialite=1 OR topics.id_confidentialite=2";                                          
                }
            else 
                {                                        
                    //REQUETE VERSION PUBLIC
                    $requete_topic = "SELECT * FROM utilisateurs INNER JOIN topics ON topics.id_utilisateur=utilisateurs.id WHERE topics.id_confidentialite=1";
                }   
        }                      
            
    $query_topic = mysqli_query($connexionbdd, $requete_topic);
    $topics= mysqli_fetch_all($query_topic, MYSQLI_ASSOC);                  
?>