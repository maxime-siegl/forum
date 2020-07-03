<?php
    session_start();    
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Membre Forum</title>
    <link rel="stylesheet" href="css/style.css">
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
                    <img id="avatar" src="<?php echo $info_profil[0]['avatar'];?>" alt="avatar de profil" width="45vw" height="45vh">
                    <section id="log_rang">
                        <p id="log">
                            <?php echo $info_profil[0]['login']; ?>
                        </p>
                        <p id="rang">
                            <?php echo $rang[0]['rang']; ?>
                        </p>
                    </section>
                </section>
                <section id="last_mess">
                    <p id="last-msg">
                        <?php echo $mess[0]['message']; ?>
                    </p>
                </section>
            </section>
            <section id="perso">
                <p id="nom">
                    <?php echo $info_profil[0]['nom'] ; ?>
                </p>
                <p id="prenom">
                    <?php echo $info_profil[0]['prenom']; ?>
                </p>
                <p id="mail">
                    <?php echo $info_profil[0]['mail']; ?>
                </p>
                <p id="nb_conv">
                    <?php echo  $nb_conv[0]['COUNT(*)'] ; ?>
                </p>
                <p id="nb_mess">
                    <?php echo $nb_msg[0]['COUNT(*)']; ?>
                </p>              
            </section>
        </section>
    </main>
    <footer>
    
    </footer>
</body>
</html>