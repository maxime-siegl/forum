<?php
    // recup last message
    if (isset($_GET['id_posteur']) && !empty($_GET['id_posteur']))
    {
        $id_posteur = $_GET['id_posteur'];

        $mess_info = "SELECT * FROM messages WHERE id_utilisateur = '$id_posteur' ORDER BY date DESC";
        $mess_info_query = mysqli_query($bdd, $mess_info);
        $mess = mysqli_fetch_all($mess_info_query, MYSQLI_ASSOC);

        //var_dump($mess);
        //echo $mess[0]['message']; // recup le message tout en haut du tab qui est le dernier message posté
    }
?>