<?php 
    session_start();    
    include 'include/php_topic.php';   
    //session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css"/>
    <title>Topics</title>
</head>
<body>
    <header>
        <?php include 'include/header.php';?>
    </header>

    <main id="topic">
        <h1>Topics</h1>
        <table class="table_vu">
            <thead>
                <tr>
                    <th>Tous les topics</th>
                </tr>
            </thead>
            <tbody>            
                <tr class="titre_table">
                    <td>Nom</td>
                    <td>Description</td>
                    <td>Nombre de conversations</td>
                    <td>Création</td>
                    <td></td>
                </tr>    
                <?php 
                    foreach($topics as $nbtopic => $info_topic)
                        {                              
                            ?>
                            <tr>
                                <td><a href="conversation.php?id_topic=<?php echo $info_topic["id"];?>"><?php echo $info_topic["titre"];?></a></td>
                                <td><?php echo $info_topic["description"];?></td>
                                <?php count_conv($info_topic);?><!-- fonction qui compte le nbr de conv dans chaque topics-->
                                <td><?php date_topic($info_topic);?> par <?php echo$info_topic["login"];?></td>
                                <?php suppressiontopic($info_topic);?>
                            </tr>  
                            <?php                             
                        }
                ?>
            </tbody>
        </table>
        <?php
            form_topic($rang);//Affiche le formulaire si admin ou modo
            if(isset($msg_error))
                {
                ?>
                            <p class="msg_error">
                <?php
                            echo $msg_error;
                ?>
                            </p>
                <?php
                }           
        ?>
    </main>

    <!-- Include footer -->
</body>
</html>