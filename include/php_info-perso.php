<?php
    // recup nom prenom mail et le nombre de conv créés et le nombre de message posté
    if (isset($_GET['id_posteur']) && !empty($_GET['id_posteur']))
    {
        $id_posteur = $_GET['id_posteur'];

        // recup le nombre de conv créer par l'utilisateur
        $number = "SELECT COUNT(*) FROM conversations WHERE id_utilisateur = '$id_posteur' ";
        $number_query = mysqli_query($bdd, $number);
        $nb_conv = mysqli_fetch_all($number_query, MYSQLI_ASSOC);

        // var_dump($nb_conv);

        // recup le nombre de mess créer par l'utilisateur
        $nombre = "SELECT COUNT(*) FROM messages WHERE id_utilisateur = '$id_posteur' ";
        $nombre_query = mysqli_query($bdd, $nombre);
        $nb_msg = mysqli_fetch_all($nombre_query, MYSQLI_ASSOC);
        
        // var_dump($nb_msg);
    }
?>