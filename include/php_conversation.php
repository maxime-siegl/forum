<?php
    //test
   require_once 'fonctions/fonction_global.php';
   $connexionbdd = connexionbdd();
   
        if(isset($_GET["id_topic"]))
            {                
                $id_topic = $_GET["id_topic"];
                $requete = "SELECT * FROM conversations WHERE id_topic=$id_topic";
                $query = mysqli_query($connexionbdd, $requete);
                $conversation = mysqli_fetch_all($query, MYSQLI_ASSOC);

                var_dump($conversation);
            }
    //test
    
    ?>