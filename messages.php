<?php
    session_start();
    include 'include/php_message.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css"/>
    <title>Document</title>
</head>
<body>
    <header>
        <?php include 'include/header.php';?>
    </header>

    <main>
        <form action="" method="POST">
            <label for="msg"></label>
            <textarea name="msg" id="msg" cols="50" rows="5"></textarea>

            <input type="submit" name="new_msg">
        </form>
    </main>
</body>
</html>