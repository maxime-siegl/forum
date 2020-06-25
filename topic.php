<?php 
    session_start();
    include 'include/php_topic.php';
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
    </main>

    <!-- Include footer -->
</body>
</html>