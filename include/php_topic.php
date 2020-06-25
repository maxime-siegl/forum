<?php

//faire 2 versions : admin à acces au formulaire en plus des l'affichage des topics
    require_once '../fonctions/fonction_global.php';
    
    $connexionbdd = connexionbdd();
    $requete_rang = "SELECT * FROM confidentialite";
    $query_rang = mysqli_query($connexionbdd, $requete_rang);
    $rang = mysqli_fetch_all($query_rang, MYSQLI_ASSOC);

    var_dump($rang);

?>