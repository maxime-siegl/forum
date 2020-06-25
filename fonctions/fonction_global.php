<?php
function connexionbdd()
    {
        $connexionbdd = mysqli_connect("localhost", "root", "", "forum");
        return $connexionbdd;
    }
?>