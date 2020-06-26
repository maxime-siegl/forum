<?php
    session_start();
    if (isset($_POST['deco']))
    {
        session_destroy();
        header('location:connexion.php')
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Profil Forum</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header></header>
    <main>
        <?php
            
        ?>
    </main>
    <footer></footer>
</body>
</html>