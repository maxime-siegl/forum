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
        <table class="table_tc">
            <thead>
                <tr>
                    <th><h1>Topics</h1></th>
                </tr>
                <tr class="titre_table">
                    <th>Nom</th>
                    <th>Description</th>
                    <th>Nombre de conversations</th>
                    <th>Création</th>
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
                    foreach($topics as $nbtopic => $info_topic)
                        {                              
                            ?>
                            <tr>
                                <td><a href="conversation.php?id_topic=<?php echo $info_topic["id"];?>"><?php echo $info_topic["titre"];?></a></td>
                                <td><?php echo $info_topic["description"];?></td>
                                <?php count_conv($info_topic);?><!-- fonction qui compte le nbr de conv dans chaque topics-->
                                <td><?php date_topic($info_topic);?> par  <a href="membre.php?id_posteur=<?php echo $info_topic["id_utilisateur"];?>"><?php echo$info_topic["login"];?></a></td>
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

    <?php include 'include/footer.php';?>
</body>
</html>