<?php   
    require_once 'fonctions/fonction_global.php';
    require_once 'fonctions/fonction_conversation.php';

    $connexionbdd = connexionbdd();
   
    //Affiche les conversations liées au topic
    if(isset($_GET["id_topic"]))
        {                
            $id_topic = $_GET["id_topic"];

            $requete = "SELECT * FROM utilisateurs INNER JOIN conversations ON conversations.id_utilisateur=utilisateurs.id WHERE id_topic=$id_topic";
            $query = mysqli_query($connexionbdd, $requete);
            $conversation = mysqli_fetch_all($query, MYSQLI_ASSOC);
           
            dernier_msg();
            
        }
    //INSERTION NOUVELLE CONVERSATION DANS BDD
    if(isset($_POST["crea_conv"]) && !empty($_POST["titre"]) && !empty($_POST["description"]))
        {
            $titre = $_POST["titre"];

            $requete_conv = "SELECT * FROM conversations WHERE titre='$titre' AND id_topic=$id_topic";
            $query_conv = mysqli_query($connexionbdd, $requete_conv);
            $isset_conv = mysqli_fetch_all($query_conv, MYSQLI_ASSOC);
            
            if(empty($isset_conv))
                {
                    echo "valide";
                }
            else
                {
                    echo "existe déjà";
                }
        }
    
?>