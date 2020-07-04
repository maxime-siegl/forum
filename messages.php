<?php
    session_start();
    include 'include/php_message.php';   
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css"/>
    <title>Messages</title>
</head>
<body>
    <header>
        <?php include 'include/header.php';?>
    </header>

    <main id="messages">
        <h1><a href="conversation.php?id_topic=<?=$id_topic;?>" id="titre_msg"><img src="image/retour.png" alt="fleche retour" class="titre_retour"><?= mb_strtoupper($titre_conversation); ?></a></h1>
        <?php
             if(empty($messages))
                {
                    ?>
                    <p>Il n'y a pas encore de messages dans <b><?php echo $titre_conversation;?><b></p>                   
                    <?php
                    if(!isset($_SESSION["login"]))                                
                        {
                            ?>
                            <p>Si tu souhaites créer une conversation, je t'invite à <a href="inscription.php">t'inscire</a> et/ou à te <a href="connexion.php">connecter</a></p>
                            <?php
                        }                                                         
                }
            foreach($messages as $numero_msg => $info_msg)
                {                         
                    ?>
                     <section class="messages_vu">                         
                            <section class="color_msg">
                                <section class="poster_a">
                                    <a href="membre.php?id_posteur=<?php echo $info_msg["id_utilisateur"];?>" class="login"><?php echo $info_msg["login"];?></a>
                                    <?= $info_msg["jour"] . " - " . $info_msg["heure"];?>
                                </section>                            
                                <p><?php echo $info_msg["message"];?></p>   
                            </section>                                                  
                            <?php
                                if(isset($_SESSION["login"]))
                                {
                                    ?>
                                    <section class="interaction">
                                        <section class="gestion_msg">
                                            <a href="include/php_interaction.php?type=1&id_msg=<?php echo $info_msg["id"];?>&id_conv=<?= $id_conv ?>"><img src="image/like.png" alt="bouton like"></a><?= comptelikes($info_msg) ?>
                                            <a href="include/php_interaction.php?type=2&id_msg=<?php echo $info_msg["id"];?>&id_conv=<?= $id_conv ?>"><img src="image/dislike.png" alt="bouton dislike"></a><?= comptedislikes($info_msg) ?>
                                        </section>             
                                        <section class="gestion_msg">
                                            <a href="include/php_interaction.php?type=3&id_msg=<?php echo $info_msg["id"];?>&id_conv=<?= $id_conv ?>"><img src="image/report.png" alt="bouton signalement"></a>
                                            <?php suppressionmessages($info_msg);?>
                                        </section>                                                           
                                    </section>                                                
                     </section>
                                <?php                               
                            }                                                                
                }        
            if(isset($_SESSION["login"]))
                {
                    ?>
                     <form action="" method="POST" id="form_msg">
                        <label for="msg"></label>
                        <textarea name="msg" id="msg" cols="50" rows="5"></textarea>

                        <input type="submit" name="new_msg" value="Envoyer">
                    </form>
                    <?php
                }             
        ?>   
    </main>

    <?php include 'include/footer.php';?>
</body>
</html>