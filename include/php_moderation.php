<?php
    require_once 'fonctions/fonction_global.php';
    
    $bdd = connexionbdd();
    // recup infos des users et la confidentialité
    $users = "SELECT * FROM confidentialite INNER JOIN utilisateurs ON utilisateurs.id_confidentialite = confidentialite.id";
    $users_query = mysqli_query($bdd, $users);
    $recup_users = mysqli_fetch_all($users_query, MYSQLI_ASSOC);

    //var_dump($recup_users);
?>
