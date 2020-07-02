<?php
    require_once 'fonctions/fonction_global.php';

    $connexionbdd = connexionbdd();

    //CHERCHE LES INFOS ADMIN OU MODO => afficher sur le côté
    $requete_admin = "SELECT login, avatar, rang FROM utilisateurs INNER JOIN confidentialite ON confidentialite.id=utilisateurs.id_confidentialite WHERE id_confidentialite=3 OR id_confidentialite=4";
    $query_adimn = mysqli_query($connexionbdd, $requete_admin);
    $info_admin_modo = mysqli_fetch_all($query_adimn);

    //SELECTION LES 3 TOPICS AVEC LE PLUS DE CONVERSATIONS
    $requete_topic_co = "SELECT COUNT(conversations.id), id_topic, topics.titre, topics.description, login, topics.date FROM conversations INNER JOIN topics ON conversations.id_topic=topics.id INNER JOIN utilisateurs ON topics.id_utilisateur=utilisateurs.id GROUP BY id_topic ORDER BY COUNT(conversations.id) DESC LIMIT 3";    
    $query_topic_co = mysqli_query($connexionbdd, $requete_topic_co);
    $topic_co = mysqli_fetch_all($query_topic_co, MYSQLI_ASSOC);   

    //SELECTION LES 3 TOPICS AVEC LE PLUS DE CONVERSATIONS
    $requete_topic_public = "SELECT COUNT(conversations.id), id_topic, topics.titre, topics.description, login, topics.date FROM conversations INNER JOIN topics ON conversations.id_topic=topics.id INNER JOIN utilisateurs ON topics.id_utilisateur=utilisateurs.id WHERE topics.id_confidentialite = 1 GROUP BY id_topic ORDER BY COUNT(conversations.id) DESC LIMIT 3"; 
    $query_topic_public = mysqli_query($connexionbdd, $requete_topic_public);
    $topic_public = mysqli_fetch_all($query_topic_public, MYSQLI_ASSOC);       
?>