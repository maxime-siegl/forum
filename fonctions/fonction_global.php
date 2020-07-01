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

?>