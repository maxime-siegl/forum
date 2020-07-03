<?php 
    session_start();
    include 'include/php_index.php';
    require_once 'fonctions/fonction_topic.php';   
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
        <h1>Nom du site</h1>
        <section id="accueil">
            <section id="topics_tendace">
                <table>
                    <thead>
                        <th>Topics tendance</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Titre</td>
                            <td>Description</td>
                            <td>Nombre de conversations</td>
                            <td>Création</td>
                        </tr>
                        <?php
                        if(isset($_SESSION["login"]))
                            {
                                foreach($topic_co as $nbtopic => $info_topic_co)
                                    {                              
                                        ?>
                                        <tr>
                                            <td><a href="conversation.php?id_topic=<?php echo $info_topic_co["id_topic"];?>"><?php echo $info_topic_co["titre"];?></a></td>
                                            <td><?php echo $info_topic_co["description"];?></td>
                                            <?php nbconvco($info_topic_co);?><!-- fonction qui compte le nbr de conv dans chaque topics-->
                                            <td><?php date_topic($info_topic_co);?> par <?php echo$info_topic_co["login"];?></td>                            
                                        </tr>  
                                        <?php                             
                                    }
                            }
                        else
                            {
                                foreach($topic_public as $nbtopic => $info_topic_public)
                                    {                              
                                        ?>
                                        <tr>
                                            <td><a href="conversation.php?id_topic=<?php echo $info_topic_public["id_topic"];?>"><?php echo $info_topic_public["titre"];?></a></td>
                                            <td><?php echo $info_topic_public["description"];?></td>
                                            <?php nbconvpublic($info_topic_public);?><!-- fonction qui compte le nbr de conv dans chaque topics-->
                                            <td><?php date_topic($info_topic_public);?> par <?php echo$info_topic_public["login"];?></td>                            
                                        </tr>  
                                        <?php                             
                                    }
                            }
                            
                        ?>
                    </tbody>
                </table>
            </section>
            <section id="info_log">
                <?php
                    foreach($info_admin_modo as $ndadmin => $log_admin)
                        {                                   
                            ?>
                            <section>                            
                                <img src="<?= $log_admin[1];?>" alt="avatar utilisateur" class="avatar_accueil"> 
                                <p><?= $log_admin[0];?></p>
                                <p>Rôle :<?=$log_admin[2];?></p>
                            </section>
                            <?php
                        }
                ?>
            </section>
        </section>
        
       
    </main>
</body>
</html>