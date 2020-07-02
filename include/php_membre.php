<?php
    require_once 'fonctions/fonction_global.php';
    
    $bdd = connexionbdd();
    if (isset($_GET['id_posteur']) && !empty($_GET['id_posteur']))
    {
        $id_posteur = $_GET['id_posteur'];
        // recup toutes infos de l'id de l'utilisateur
        $profil = "SELECT * FROM utilisateurs WHERE id = '$id_posteur' ";
        $profil_query = mysqli_query($bdd, $profil);
        $info_profil = mysqli_fetch_all($profil_query, MYSQLI_ASSOC);

        // recup toutes les conv de l'id utilisateur
        $conv = "SELECT * FROM conversations WHERE id_utilisateur = '$id_posteur' ";
        $conv_query = mysqli_query($bdd, $conv);
        $info_conv = mysqli_fetch_all($conv_query, MYSQLI_ASSOC);

        // recup tous les messages de l'id utilisateur
        $mess = "SELECT * FROM messages WHERE id_utilisateur = '$id_posteur' ";
        $mess_query = mysqli_query($bdd, $mess);
        $info_mess = mysqli_fetch_all($mess_query, MYSQLI_ASSOC);

        // var_dump($info_profil);
        // var_dump($info_conv);
        // var_dump($info_mess);

        // recup le rang par rapport a la confidentialite
        $rang_log = "SELECT * FROM confidentialite INNER JOIN utilisateurs ON utilisateurs.id_confidentialite = confidentialite.id WHERE utilisateurs.id = '$id_posteur' ";
        $rang_query = mysqli_query($bdd, $rang_log);
        $rang = mysqli_fetch_all($rang_query, MYSQLI_ASSOC);


        // recup last message
        $mess_info = "SELECT * FROM messages WHERE id_utilisateur = '$id_posteur' ORDER BY date DESC";
        $mess_info_query = mysqli_query($bdd, $mess_info);
        $mess = mysqli_fetch_all($mess_info_query, MYSQLI_ASSOC);

        //var_dump($mess);
        //echo $mess[0]['message']; // recup le message tout en haut du tab qui est le dernier message posté



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