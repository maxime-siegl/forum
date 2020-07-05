<?php
    session_start();   
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modération</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <?php include 'include/header.php' ; ?>
    </header>
    <main id="moderation">
        <?php include 'include/php_moderation.php' ; ?>
        <section id="tableau_users">
            <h1>Liste des Membres</h1>
            <table>
                <thead id="thead">
                    <tr>
                        <th>Login</th>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Rang</th>
                    </tr>
                </thead>
                <tbody>
                    <?php include 'include/php_tableau_users.php' ; ?>
                </tbody>
                
            </table>
        </section>
        <section id="msg_douteux">
            <h1>Messages signalés</h1>
            <table>
                <thead>
                    <tr>
                        <th>Login</th>
                        <th>Date</th>
                        <th>Message</th>
                    </tr>    
                </thead>
                <tbody>
                    <?php include 'include/php_signalement.php' ; ?>
                </tbody>
            </table>
        </section>
    </main>
    
    <?php include 'include/footer.php';?>
    
</body>
</html>