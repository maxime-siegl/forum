<?php

//faire 2 versions : admin à acces au formulaire en plus des l'affichage des topics
    require_once 'fonctions/fonction_global.php';
    $connexionbdd = connexionbdd();

    //Va chercher tous les rangs de bdd
    $requete_rang = "SELECT * FROM confidentialite";
    $query_rang = mysqli_query($connexionbdd, $requete_rang);
    $rang = mysqli_fetch_all($query_rang, MYSQLI_ASSOC);

    //Va chercher tous les topics / VERSION ADMIN/MODO-mettre la requete dans le if et la query et fectch_all en dehors
    $requete_topic_admin = "SELECT * FROM topics";
    $query_topic_admin = mysqli_query($connexionbdd, $requete_topic_admin);
    $topic_admin = mysqli_fetch_all($query_topic_admin, MYSQLI_ASSOC);

    //VERSION MEMBRE-mettre la requete dans le if et la query et fectch_all en dehors
    $requete_topic_membre = "SELECT * FROM topics WHERE id_confidentialite=1 OR id_confidentialite=2";
    $query_topic_membre = mysqli_query($connexionbdd, $requete_topic_membre);
    $topic_membre_brut = mysqli_fetch_all($query_topic_membre, MYSQLI_ASSOC);

    //VERSION PUBLIC-mettre la requete dans le if et la query et fectch_all en dehors
    $requete_topic_public = "SELECT * FROM topics WHERE id_confidentialite=1";
    $query_topic_public = mysqli_query($connexionbdd, $requete_topic_public);
    $topic_public_brut = mysqli_fetch_all($query_topic_public, MYSQLI_ASSOC);


    //A mettre dans la condition user = admin ou modo
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