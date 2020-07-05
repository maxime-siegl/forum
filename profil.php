<?php
    session_start();    
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Profil Forum</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <?php include 'include/header.php' ; ?>
    </header>
    <main id="profil">
        <?php
            if (isset($_SESSION['login']))
            {
                require_once 'fonctions/fonction_global.php';
                $bdd = connexionbdd();
                $message_erreur = "";
                include('include/php_profil.php');
                include('include/php_avatar.php');
                
        ?>
                <form action="profil.php" method="POST" enctype="multipart/form-data">
                    <section id="formulaire">
                        <section id="img_avatar">
                            <img src="<?php echo $_SESSION['avatar']; ?>" alt="Avatar membre" width="45vw" height="45vh">
                            <label for="avatar">Votre Avatar</label>
                            <input type="file" name="avatar" id="file">
                        </section>
                        <section id="info_co">
                            <p class="label">
                                <label for="login">Login</label>
                                <input type="text" name="login" value="<?php echo $_SESSION['login']; ?>" required>
                            </p>
                            <p class="label">
                                <label for="mdp_actuel">Mot de Passe actuel</label>
                                <input type="password" name="mdp_actuel" required>
                            </p>
                            <p class="label">
                                <label for="new_mdp">Nouveau Mot de Passe</label>
                                <input type="password" name="new_mdp">
                            </p>    
                            <p class="label">    
                                <label for="confirmation_newmdp">Confirmation du nouveau mot de passe</label>
                                <input type="password" name="confirmation_newmdp">
                            </p>
                        </section>
                    </section>
                    <section id="info_perso">
                        <p class="info">
                            <label for="nom">Nom</label>
                            <input type="text" name="nom" value="<?php echo $_SESSION['nom']; ?>" required>
                        </p>    
                        <p class="info">  
                            <label for="prenom">Prénom</label>
                            <input type="text" name="prenom" value="<?php echo $_SESSION['prenom']; ?>" required>
                        </p>
                        <p class="info">
                            <label for="mail">Email</label>
                            <input type="email" name="mail" value="<?php echo $_SESSION['mail']; ?>" required>
                        </p>
                    </section>
                    <section id="bouton"><button type="submit" name="modification" id="bouton">Modifier</button></section>
                </form>
        <?php
            }
            else
            {
                header('location:connexion.php');
            }
        ?>
        <p class="msg_erreur">
            <?php echo $message_erreur; ?>
        </p>
    </main>
    
    <?php include 'include/footer.php';?>
    
</body>
</html>