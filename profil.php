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
    <title>Profil Forum</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <?php include('include/header.php'); ?>
    </header>
    <main>
        <?php
            if (isset($_SESSION['login']))
            {
                $bdd = mysqli_connect('localhost', 'root', '', 'forum');
                $message_erreur = "";
                include('include/php_profil.php');
        ?>
                <form action="profil.php" method="POST">
                    <section id="formulaire">
                        <section id="img_avatar">
                            <img src="<?php ?>" alt="Avatar membre" width="45vw" height="45vh">
                            <label for="avatar">Votre Avatar</label>
                            <input type="file" name="avatar">
                        </section>
                        <section id="info_co">
                            <p>
                                <label for="login">Login</label>
                                <input type="text" name="login" value="<?php echo $_SESSION['login']; ?>" required>
                                <label for="mdp_actuel">Mot de Passe actuel</label>
                                <input type="password" name="mdp_actuel" required>
                                <label for="new_mdp">Nouveau Mot de Passe</label>
                                <input type="password" name="new_mdp">
                                <label for="confirmation_newmdp">Confirmation du nouveau mot de passe</label>
                                <input type="password" name="confirmation_newmdp">
                            </p>
                        </section>
                    </section>
                    <section id="info_perso">
                        <p>
                            <label for="nom">Nom</label>
                            <input type="text" name="nom" value="<?php echo $_SESSION['nom']; ?>" required>
                            <label for="prenom">Prénom</label>
                            <input type="text" name="prenom" value="<?php echo $_SESSION['prenom']; ?>" required>
                            <label for="mail">Email</label>
                            <input type="email" name="mail" value="<?php echo $_SESSION['mail']; ?>" required>
                        </p>
                    </section>
                    <button type="submit" name="modification">Modifier</button>
                </form>
        <?php
            }
            else
            {
                //header('location:connexion.php');
                $message_erreur = "Connectez-vous avant d'acceder à votre profil!";        
            }
        ?>
    </main>
    <footer></footer>
</body>
</html>