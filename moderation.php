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
    <main>
        <?php include 'include/php_moderation.php' ; ?>
        <section id="tableau_users">
            <table>
                <thead>
                    <tr>
                        <th>Login</th>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Rang</th>
                    </tr>
                </thead>
                <?php include 'include/php_tableau_users.php' ; ?>
            </table>
        </section>
        <section id="msg_douteux">
            <table>
                <thead>
                    <th>Login</th>
                    <th>Date</th>
                    <th>Message</th>
                </thead>
                <tbody>
                    <?php include 'include/php_signalement.php' ; ?>
                </tbody>
            </table>
        </section>
    </main>
    <footer></footer>
</body>
</html>