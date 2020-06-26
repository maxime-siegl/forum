<?php
//FONCTION CONNEXION BDD
function connexionbdd()
    {
        $connexionbdd = mysqli_connect("localhost", "root", "", "forum");
        return $connexionbdd;
    }

?>