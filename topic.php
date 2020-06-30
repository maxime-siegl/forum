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

    <main>
        <h1>Topics</h1>
        <table>
            <thead>
                <tr>
                    <th>Tous les topics</th>
                </tr>
            </thead>
            <tbody>            
                <tr>
                    <td>Nom</td>
                    <td>Description</td>
                    <td>Nombre de conversations</td>
                    <td>Création</td>
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
                            </tr>  
                            <?php                             
                        }
                ?>
            </tbody>
        </table>
        <?php
            form_topic($rang);//Affichele formulaire si admin ou modo
        ?>
    </main>

    <!-- Include footer -->
</body>
</html>