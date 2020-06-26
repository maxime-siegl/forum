<?php
    session_start();
    if (isset($_SESSION['login']))
    {
        session_destroy();
        header('location:connexion.php');
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Forum Inscription</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header></header>
    <main>
        <?php 
            if (isset($_SESSION['login']) == false) 
            {
                $bdd= mysqli_connect('localhost', 'root', '', 'forum');
                $message_erreur = ""; 
        ?>
            <form action="inscription.php" method="POST">
                <section id="img_avatar">
                    <img src="img/avatar/avatar avatar.png" alt="Avatar défaut" width="45vw" height="45vh">
                    <label for="avatar">Votre Avatar</label>
                    <input type="file" name="avatar">
                </section>
                <section id="infos_form">
                    <p>
                        <label for="login">Login</label>
                        <input type="text" name="login" required>
                        <label for="mdp">Mot de Passe</label>
                        <input type="password" name="mdp" required>
                        <label for="confirmation_mdp">Confirmation de mot de passe</label>
                        <input type="password" name="confirmation_mdp" required>
                        <button type="submit" name="inscription">S'inscrire</button>
                    </p>
                </section>
            </form>
            <?php include('include/php_inscription.php'); ?>
            <?php include('include/php_avatar.php'); ?>
        <?php 
                mysqli_close($bdd);
            } 
            else 
            { 
                $message_erreur = "Tu es déjà inscrit".$_SESSION['login']."!" ; 
            }
        ?>
            <p class="msg_erreur">
                <?php echo $message_erreur; ?>
            </p>
    </main>
    <footer></footer>
</body>
</html>