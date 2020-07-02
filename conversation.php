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
    <main>                
        <?php
            if(empty($conversation))
                {
                    ?>
                    <p>Il n'y a pas encore de conversations dans <b><?php echo $titre_topic;?><b></p>
                    <?php
                    if(!isset($_SESSION["login"]))                                
                        {
                            ?>
                            <p>Si tu souhaites créer une conversation, je t'invite à <a href="inscription.php">t'inscire</a> et/ou à te <a href="connexion.php">connecter</a></p>
                            <?php
                        }                                                           
                }
            else
                {
                    ?>
                    <table>
                        <thead>
                            <th><?php echo $titre_topic;?></th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Sujet</td>
                                <td>Description</td>
                                <td>Date</td>
                                <td>Par</td>
                                <td>Nombre message</td>
                                <td>Dernier message</td>
                            </tr>
                    <?php
                    foreach($conversation as $nbconversation => $info_conv)
                        {                                   
                            ?>                                                            
                            <tr>
                                <td><a href="messages.php?id_conv=<?php echo $info_conv["id"];?>"><?php echo $info_conv["titre"]; ?></a></td>
                                <td><?php echo $info_conv["description"];?></td>   
                                <td><?php date_conv($info_conv);?></td>
                                <td><?php echo $info_conv["login"];?></td>
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
</body>
</html>
