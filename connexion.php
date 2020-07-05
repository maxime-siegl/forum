<?php
    session_start();    
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Forum Connexion</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <?php include 'include/header.php' ; ?>
    </header>
    <main id="connexion">
        <?php
            if (isset($_SESSION['login']) == false)
            {
                require_once 'fonctions/fonction_global.php';
                $bdd = connexionbdd();
                $message_erreur = "";
        ?>
                <form action="connexion.php" method="POST">
                    <p id="lab_info">
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
   
    <?php include 'include/footer.php';?>

</body>
</html>