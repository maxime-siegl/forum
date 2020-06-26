<?php 
    session_start();    
    include 'include/php_topic.php';
    session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css"/>
    <title>Topics</title>
</head>
<body>
    <!-- Include header -->

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
                    <td>Création</td>
                </tr>    
                <?php 
                    foreach($topics as $nbtopic => $info_topic)
                        {
                            ?>
                            <tr>
                                <td><a href="conversation.php?id_topic=<?php echo $info_topic["id"];?>&id_confidentialite=<?php echo $info_topic["id_confidentialite"];?>"><?php echo $info_topic["titre"];?></a></td>
                                <td><?php echo $info_topic["description"];?></td>
                                <td><?php echo $info_topic["date"];?> par <?php echo$info_topic["login"];?></td>
                            </tr>
                            <?php
                        }
                ?>
            </tbody>
        </table>
        <?php
            if(isset($_SESSION["id_confidentialite"]) && $_SESSION["id_confidentialite"]>=3)
                {
                    ?>
                    <form action="topic.php" method="POST">
                        <label for="titre">Titre :</label>
                        <input type="text" id="titre" name="titre" required>

                        <label for="description" >Description :</label>
                        <input type="text" id="description" name="description" required>

                        <label for="acces">Visible par :</label>
                        <select name="acces" id="acces" required>
                        <?php
                            foreach($rang as $role => $info_rang)
                                {
                                    ?>
                                    <option value="<?php echo $info_rang["id"];?>"><?php echo $info_rang["rang"];?></option>
                                    <?php
                                }
                        ?>
                        </select>        
                        
                        <input type="submit" name="ajout_topic" value="Créer">            
                    </form>         
                    <?php
                }
        ?>
    </main>

    <!-- Include footer -->
</body>
</html>