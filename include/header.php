<section id="header">
    <ul>
        <li><a href="index.php">Accueil</a></li>
        <li><a href="topic.php">Topics</a></li>
        <?php 
            if (isset($_SESSION['login']) == false)
            {
                echo '<li><a href="inscription.php">Inscription</a></li>';
                echo '<li><a href="connexion.php">Connexion</a></li>';
            }
            else if (isset($_SESSION['login']) && ($_SESSION['id_confidentialite'] == 3 || $_SESSION['id_confidentialite'] == 4))
            {
                echo '<li><a href="profil.php">Profil</a></li>';
                echo '<li><a href="moderation.php">Modération</a></li>';
                echo '<li><form method="POST" action=""><button type="submit" name="deco">Déconnexion</button></form></li>';
            }
            else if (isset($_SESSION['login']) && ($_SESSION['id_confidentialite'] == 2))
            {
                echo '<li><a href="profil.php">Profil</a></li>';
                echo '<li><form method="POST" action=""><button type="submit" name="deco">Déconnexion</button></form></li>';
            }
            // var_dump($_SESSION);
        ?>
    </ul>
</section>