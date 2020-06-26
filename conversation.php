<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css"/>
    <title>Document</title>
</head>
<body>
    <?php
    //test
   require_once 'fonctions/fonction_global.php';
   $connexionbdd = connexionbdd();
   
        if(isset($_GET["id_topic"]) && $_GET["id_topic"]==3)
            {
                $requete = "SELECT * FROM conversations WHERE id_confidentialite=1 OR id_confidentialite=2";
                $query = mysqli_query($connexionbdd, $requete);
                $conversation = mysqli_fetch_all($query, MYSQLI_ASSOC);

                var_dump($conversation);
            }
    //test
    ?>
</body>
</html>