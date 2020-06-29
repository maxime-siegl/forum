<<<<<<< HEAD
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
    <table>
        <thead>
            <th><!--titre du topic --></th>
        </thead>
        <tbody>
            <tr>
                <td>Sujet</td>
                <td>Description</td>
                <td>Date</td>
                <td>Par</td>
                <td>Nombre message</td>
                <td>Dernier message</td>
            </tr>
                <?php
                    foreach($conversation as $nbconversation => $info_conv)
                        {                           
                            ?>
                            <tr>
                                <td><?php echo $info_conv["titre"]; ?></td>
                                <td><?php echo $info_conv["description"];?></td>   
                                <td><?php date_conv($info_conv);?></td>
                                <td><?php echo $info_conv["login"];?></td>
                                <?php count_message($info_conv); ?>
                                <?php dernier_msg($conversation); ?>
                            </tr>
                            <?php
                        }
                ?>
        </tbody>
    </table>
    <?php
        if(isset($_SESSION["id_confidentialite"]))//A CHANGER PAR LOGIN
            {
                form_conv();
            }
    ?>
</body>
</html>
=======
>>>>>>> maxime
