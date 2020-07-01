<?php
    session_start();
    if ($_POST['deco'])
    {
        session_destroy();
        header('location:connexion.php');
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Membre Forum</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <?php include 'include/header.php'; ?>
    </header>
    <main id="membre">
        <?php include 'include/php_membre.php'; ?>
        <section id="ligne">
            <section id="colonne">
                <section id="avatar_log">
                    <?php include 'php_avatar-login.php';?>
                    <img id="avatar" src="<?php echo "avatar";?>" alt="avatar de profil">
                    <section id="log_rang">
                        <p id="log">
                            <?php echo "login"; ?>
                        </p>
                        <p id="rang">
                            <?php echo "Rang"; ?>
                        </p>
                    </section>
                </section>
                <section id="last_mess">
                    <?php include 'php_last-message.php';?>
                </section>
            </section>
            <section id="perso">
                <?php include 'php_info-perso.php';?>
            </section>
        </section>
    </main>
    <footer>
    
    </footer>
</body>
</html>