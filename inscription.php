<?php
    session_start();
    if (isset($_POST['deco']))
    {
        session_destroy();
        header('location:connexoin.php');
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription Forum</title>
</head>
<body>
    <header></header>
    <main>
        <?php
            if(isset($_SESSION['login']) == false)
            {
        ?>
        <form action="inscription.php" method="POST">
            <p>
                <section id="avatar">
                    <label for="avatar">Choisisez un Avatar</label>
                    <input type="image" src="" alt="Avatar" name="avatar">
                </section>
                <section id="info_form">
                    <label for="login">Login</label>
                    <input type="text" name="login">
                    <label for="mdp">Mot de Passe</label>
                    <input type="password" name="mdp">
                    <label for="confirmation_mdp">Confirmation du mot de passe</label>
                    <input type="password" name="confirmation_mdp">
                    <button type="submit" name="inscription">S'inscrire</button>
                </section>
            </p>
        </form>
        <?php
            include('include/php_inscription.php');
            }
            else
            {
        ?>
                <p>
                    Non, non, non <?php echo $_SESSION['login'];?> tu es déjà inscrit.
                </p>
        <?php
            }
        ?>
        <!-- Message erreur marche pas -->
        <?php echo $message_erreur; ?>
    </main>
    <footer></footer>
</body>
</html>