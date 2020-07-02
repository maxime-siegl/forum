<?php
    session_start();
    include 'include/php_message.php';   
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css"/>
    <title>Document</title>
</head>
<body>
    <header>
        <?php include 'include/header.php';?>
    </header>

    <main>
        <h1><?= $titre_conversation; ?></h1>
        <?php
            foreach($messages as $numero_msg => $info_msg)
                {                    
                    ?>
                     <section>
                        <a href="membre.php?id_posteur=<?php echo $info_msg["id_utilisateur"];?>"><h4><?php echo $info_msg["login"];?></h4></a>
                        <p><?php echo $info_msg["message"];?></p>                        
                        <?php
                            if(isset($_SESSION["login"]))
                            {
                                ?>
                                <section>
                                    <a href="include/php_interaction.php?type=1&id_msg=<?php echo $info_msg["id"];?>&id_conv=<?= $id_conv ?>"><img src="image/like.png" alt="bouton like"></a><?= comptelikes($info_msg) ?>
                                    <a href="include/php_interaction.php?type=2&id_msg=<?php echo $info_msg["id"];?>&id_conv=<?= $id_conv ?>"><img src="image/dislike.png" alt="bouton dislike"></a><?= comptedislikes($info_msg) ?>
                                    <a href="include/php_interaction.php?type=3&id_msg=<?php echo $info_msg["id"];?>&id_conv=<?= $id_conv ?>"><img src="image/report.png" alt="bouton signalement"></a>
                                </section> 
                                <?php                               
                            }                                                                
                }
        ?>
       
        <form action="" method="POST">
            <label for="msg"></label>
            <textarea name="msg" id="msg" cols="50" rows="5"></textarea>

            <input type="submit" name="new_msg">
        </form>
    </main>
</body>
</html>