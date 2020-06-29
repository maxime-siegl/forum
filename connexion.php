<?php
    session_start();
    if (isset($_POST['deco']))
    {
        session_destroy();
        header('location:connexion.php');
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Forum Connexion</title>
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
                $bdd = mysqli_connect('localhost', 'root', '', 'forum');
                $message_erreur = "";
        ?>
                <form action="connexion.php" method="POST">
                    <p>
                        <label for="login">Login</label>
                        <input type="text" name="login" required>
                        <label for="mdp">Mot de Passe</label>
                        <input type="password" name="mdp" required>
                        <button type="submit" name="connexion">Se Connecter</button>
                    </p>
                </form>
        <?php
                include('include/php_connexion.php');
                mysqli_close($bdd);
            }
            else
            {
                $message_erreur = "Vous êtes déjà connecté".$_SESSION['login']."!";
            }
        ?>
        <p class="msg_erreur">
            <?php echo $message_erreur; ?>
        </p>
    </main>
    <footer></footer>
</body>
</html>