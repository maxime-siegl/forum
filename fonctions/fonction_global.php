<?php
//FONCTION CONNEXION BDD
function connexionbdd()
    {
        $connexionbdd = mysqli_connect("localhost", "root", "", "forum");
        return $connexionbdd;
    }
//Va chercher tous les rôles de bdd
function rang_bdd()
    {
        $connexionbdd = connexionbdd();
        $requete_rang = "SELECT * FROM confidentialite";
        $query_rang = mysqli_query($connexionbdd, $requete_rang);
        $rang = mysqli_fetch_all($query_rang, MYSQLI_ASSOC);

        return $rang;
    }

//COMPTE LE NOMBRE DE LIKES
function comptelikes($info_msg)
    {
        $id_message = $info_msg["id"];

        $connexionbdd = connexionbdd();
        $requete_likes = "SELECT COUNT(id) FROM likes WHERE id_message=$id_message";
        $query_likes = mysqli_query($connexionbdd, $requete_likes);
        $nb_likes = mysqli_fetch_row($query_likes);
        //var_dump($nb_likes);
        echo $likes = $nb_likes[0];
    }

//COMPTE LE NOMBRE DE DISLIKES
function comptedislikes($info_msg)
    {
        $id_message = $info_msg["id"];

        $connexionbdd = connexionbdd();
        $requete_dislikes = "SELECT COUNT(id) FROM dislikes WHERE id_message=$id_message";
        $query_dislikes = mysqli_query($connexionbdd, $requete_dislikes);
        $nb_dislikes = mysqli_fetch_row($query_dislikes); 
        //var_dump($nb_dislikes)       ;
        echo $dislikes = $nb_dislikes[0];
    }

?>