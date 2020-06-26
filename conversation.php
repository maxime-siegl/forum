<?php
    session_start();
    include 'include/php_conversation.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css"/>
    <title>Conversations</title>
</head>
<body>
    <?php
        if(isset($_SESSION["id_confidentialite"]))//A CHANGER PAR LOGIN
            {
                form_conv();
            }
    ?>
</body>
</html>