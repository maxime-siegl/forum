<?php
    // recup last message
    if (isset($_GET['id_posteur']) && !empty($_GET['id_posteur']))
    {
        $id_posteur = $_GET['id_posteur'];

        $mess_info = "SELECT * FROM messages WHERE id = '$id_posteur' AND date = 'PLUS RECENT' ";
        $mess_info_query = mysqli_query($bdd, $mess_info);
        $mess = mysqli_fetch_all($mess_info_query, MYSQLI_ASSOC);

        var_dump($mess);
    }
?>