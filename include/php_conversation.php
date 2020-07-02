<?php   
    require_once 'fonctions/fonction_global.php';
    require_once 'fonctions/fonction_conversation.php';

    $connexionbdd = connexionbdd();    
   
    //Affiche les conversations liées au topic    
    if(isset($_GET["id_topic"]))
        {
            $id_topic = $_GET["id_topic"];   
            
            //Récupère le titre du topic
            $requete_titre_topic = "SELECT titre FROM topics WHERE id=$id_topic";
            $query_titre_topic = mysqli_query($connexionbdd, $requete_titre_topic);
            $resultat_titre_topic = mysqli_fetch_all($query_titre_topic, MYSQLI_ASSOC);
           
            $titre_topic = $resultat_titre_topic[0]["titre"];
           
            //VERSION ADMIN/MODO
            if(isset($_SESSION["id_confidentialite"]) && ($_SESSION["id_confidentialite"]==3 || $_SESSION["id_confidentialite"]==4))
                {                                                                                         
                    $requete_conversation = "SELECT * FROM utilisateurs INNER JOIN conversations ON conversations.id_utilisateur=utilisateurs.id WHERE id_topic=$id_topic";                                                                       
                }
            //VERSION MEMBRE
            else if(isset($_SESSION["id_confidentialite"]) && $_SESSION["id_confidentialite"]==2)
                {                    
                    $requete_conversation = "SELECT * FROM utilisateurs INNER JOIN conversations ON conversations.id_utilisateur=utilisateurs.id WHERE id_topic=$id_topic AND (conversations.id_confidentialite=1 OR conversations.id_confidentialite=2)";                
                }
            //VERSION PUBLIC
            else    
                {
                    $requete_conversation = "SELECT * FROM utilisateurs INNER JOIN conversations ON conversations.id_utilisateur=utilisateurs.id WHERE id_topic=$id_topic AND conversations.id_confidentialite=1";
                }
        }       
    else    
        {
            header("location:topic.php");
        }

    $query_conversation = mysqli_query($connexionbdd, $requete_conversation);
    $conversation = mysqli_fetch_all($query_conversation, MYSQLI_ASSOC); 
    
    //INSERTION NOUVELLE CONVERSATION DANS BDD    
    if(isset($_POST["crea_conv"]) && !empty($_POST["titre"]) && !empty($_POST["description"]))
        {
            $titre = addslashes($_POST["titre"]);
            $id = $_SESSION["id"];
            $titre = addslashes($_POST["titre"]);
            $description = addslashes($_POST["description"]);
            $id_confidentialite = $_POST["confidentialite"];            

            $requete_conv = "SELECT * FROM conversations WHERE titre='$titre' AND id_topic=$id_topic";
            $query_conv = mysqli_query($connexionbdd, $requete_conv);
            $isset_conv = mysqli_fetch_all($query_conv, MYSQLI_ASSOC);
            
            if(empty($isset_conv))
                {                                      
                    $insert_conv = "INSERT INTO conversations (id_utilisateur, id_topic, titre, description, id_confidentialite) VALUES ($id, $id_topic, '$titre', '$description', $id_confidentialite)";
                    $query_insert_conv = mysqli_query($connexionbdd, $insert_conv); 
                    header("location:conversation.php?id_topic=$id_topic");               
                }
            else
                {
                    $error_conv = "Cette conversation existe déjà";
                }
        }
    
?>