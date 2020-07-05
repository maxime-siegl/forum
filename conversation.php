<?php
    session_start();
    include 'include/php_conversation.php';    
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css"/>
    <title>Conversations</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header>
        <?php include 'include/header.php';?>
    </header>
    <main id="conversation">                
        <?php
            if(empty($conversation))
                {
                    ?>
                    <section id="no_conv">
                         <p>Il n'y a pas encore de conversations dans <b><?php echo strtoupper($titre_topic);?></b></p>
                    <?php
                    if(!isset($_SESSION["login"]))                                
                        {
                            ?>
                            <p>Si tu souhaites créer une conversation, je t'invite à <a href="inscription.php">t'inscire</a> et/ou à te <a href="connexion.php">connecter</a></p>
                            <?php
                        }   
                    ?>              
                    </section>
                    <?php                                       
                }
            else
                {                    
                    ?>
                    <table class="table_tc">
                        <thead>
                            <tr>
                                <th><a href="topic.php"><img src="image/retour.png" alt="fleche retour" class="titre_retour"> <?php echo mb_strtoupper($titre_topic);?></a></th>
                            </tr>
                            <tr class="titre_table">
                                <th>Sujet</th>
                                <th>Description</th>
                                <th>Date</th>
                                <th>Par</th>
                                <th>Nombre message</th>
                                <th>Dernier message</th>
                                <?php if(isset($_SESSION["id_confidentialite"]) && $_SESSION["id_confidentialite"]==4)
                                    {
                                        ?>
                                        <th></th>
                                        <?php
                                    }
                                ?>
                            </tr>
                        </thead>
                        <tbody>
                           
                    <?php
                    foreach($conversation as $nbconversation => $info_conv)
                        {                                   
                            ?>                                                            
                            <tr>
                                <td><a href="messages.php?id_conv=<?php echo $info_conv["id"];?>"><?php echo $info_conv["titre"]; ?></a></td>
                                <td><?php echo $info_conv["description"];?></td>   
                                <td><?php date_conv($info_conv);?></td>
                                <td><a href="membre.php?id_posteur=<?php echo $info_conv["id_utilisateur"];?>"><?php echo $info_conv["login"];?></a></td>
                                <?php count_message($info_conv); ?>
                                <?php dernier_msg($info_conv["id"]); ?>
                                <?php suppressionconversation($info_conv);?>
                            </tr>   
                            <?php
                        }
                            ?>   
                        </tbody>   
                    </table>                                          
                            <?php
                            if(!isset($_SESSION["login"]))                                
                                {
                                    ?>
                                    <p>Si tu souhaites créer une conversation, je t'invite à <a href="inscription.php">t'inscire</a> et/ou à te <a href="connexion.php">connecter</a></p>
                                    <?php
                                }                               
                }
        ?>                    
        <?php
            if(isset($_SESSION["login"]))
                {
                    form_conv();   
                    if(isset($error_conv))
                        {
                        ?>
                                    <p class="msg_error">
                        <?php
                                    echo $error_conv;
                        ?>
                                    </p>
                        <?php
                        }         
                }                      
                            
        ?>
    </main>

    <?php include 'include/footer.php';?>
</body>
</html>
