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
    <title>Accueil</title>
</head>
<body>
    <header>
        <?php include 'include/header.php';?>
    </header>

    <main id="index">    
        <h1>Bienvenue sur Forum</h1>
        <section id="accueil">
            <section id="topics_tendace">
                <table id="table_tendance">
                    <thead>
                        <tr>
                            <th>TOPICS TENDANCE</th>
                        </tr>
                        <tr class="titre_table">
                            <td>Titre</td>
                            <td>Description</td>
                            <td>Nombre de conversations</td>
                            <td>Création</td>
                        </tr>
                    </thead>
                    <tbody>
                        
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
                                            <td><?php date_topic($info_topic_co);?> par <a href="membre.php?id_posteur=<?php echo $info_topic_co["id_utilisateur"];?>"><?php echo$info_topic_co["login"];?></td>                            
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
                            <hr>
                            <?php
                        }
                ?>
            </section>
        </section>
        
       
    </main>
    <?php include 'include/footer.php';?>
</body>
</html>