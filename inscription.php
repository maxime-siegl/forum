<?php
    session_start();   
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Forum Inscription</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <?php include 'include/header.php' ; ?>
    </header>
    <main id="inscription">
        <?php 
            if (isset($_SESSION['login']) == false) 
            {
                require_once 'fonctions/fonction_global.php';
                $bdd = connexionbdd();
                $message_erreur = "";
        ?>
            <form action="inscription.php" method="POST" id="form_inscription">
                <section id="formulaire">
                    <section id="img_avatar">
                        <label for="avatar">Votre Avatar</label>
                        <img src="img/avatar/avatarfilm.png" alt="Avatar défaut">
                    </section>
                    <section id="info_co">
                        <p class="lab_inp">
                            <label for="login">Login</label>
                            <input type="text" name="login" required>
                        </p>
                        <p class="lab_inp">    
                            <label for="mdp">Mot de Passe</label>
                            <input type="password" name="mdp" required>
                        </p>
                        <p class="lab_inp">
                            <label for="confirmation_mdp">Confirmation de mot de passe</label>
                            <input type="password" name="confirmation_mdp" required>
                        </p>
                    </section>
                </section>
                <section id="info_perso">
                    <p>
                        <label for="nom">Nom</label>
                        <input type="text" name="nom" required>
                    </p>
                    <p>
                        <label for="prenom">Prénom</label>
                        <input type="text" name="prenom" required>
                    </p>
                    <p>
                        <label for="mail">Email</label>
                        <input type="email" name="mail" required>
                    </p>
                </section>
                <section id="bouton"><button type="submit" name="inscription">S'inscrire</button></section>
            </form>
            <?php include('include/php_inscription.php'); ?>
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
    
    <?php include 'include/footer.php';?>
    
</body>
</html>