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
    <header>
        <?php include('include/header.php'); ?>
    </header>
    <main>
        <?php 
            if (isset($_SESSION['login']) == false) 
            {
                $bdd= mysqli_connect('localhost', 'root', '', 'forum');
                $message_erreur = "";
        ?>
            <form action="inscription.php" method="POST">
                <section id="formulaire">
                    <section id="img_avatar">
                        <label for="avatar">Votre Avatar</label>
                        <img src="img/avatar/avatarfilm.png" alt="Avatar défaut" width="45vw" height="45vh">
                    </section>
                    <section id="info_co">
                        <p>
                            <label for="login">Login</label>
                            <input type="text" name="login" required>
                            <label for="mdp">Mot de Passe</label>
                            <input type="password" name="mdp" required>
                            <label for="confirmation_mdp">Confirmation de mot de passe</label>
                            <input type="password" name="confirmation_mdp" required>
                        </p>
                    </section>
                </section>
                <section id="info_perso">
                    <p>
                        <label for="nom">Nom</label>
                        <input type="text" name="nom" required>
                        <label for="prenom">Prénom</label>
                        <input type="text" name="prenom" required>
                        <label for="mail">Email</label>
                        <input type="email" name="mail" required>
                    </p>
                </section>
                <button type="submit" name="inscription">S'inscrire</button>
            </form>
            <?php include('include/php_inscription.php'); ?>
            <!--mettre l'ajout avatar et si c'est possible aussi !-->
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