<?php

//faire 2 versions : admin à acces au formulaire en plus des l'affichage des topics
    require_once 'fonctions/fonction_global.php';
    
    $connexionbdd = connexionbdd();
    $requete_rang = "SELECT * FROM confidentialite";
    $query_rang = mysqli_query($connexionbdd, $requete_rang);
    $rang = mysqli_fetch_all($query_rang, MYSQLI_ASSOC);

    if(isset($_POST["ajout_topic"]) && !empty($_POST["titre"]) && !empty($_POST["description"]))
        {
            //initialisation des variables
            $titre = $_POST["titre"];
            $description = $_POST["description"];
            $id = $_POST["acces"];
            
            $ajout_topic = "INSERT INTO topics (id_utilisateur, titre, description, id_confidentialite) VALUES (1, '$titre', '$description', $id)";
            $query_ajout_topic = mysqli_query($connexionbdd, $ajout_topic);
        }

?>