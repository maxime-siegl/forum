<?php
//FONCTION CONNEXION BDD
function connexionbdd()
    {
        $connexionbdd = mysqli_connect("localhost", "root", "", "forum");
        return $connexionbdd;
    }
//Va chercher tous les rôles de bdd
function rang_bdd()
    {
        $connexionbdd = connexionbdd();
        $requete_rang = "SELECT * FROM confidentialite";
        $query_rang = mysqli_query($connexionbdd, $requete_rang);
        $rang = mysqli_fetch_all($query_rang, MYSQLI_ASSOC);

        return $rang;
    }

//COMPTE LE NOMBRE DE LIKES
function comptelikes($info_msg)
    {
        $id_message = $info_msg["id"];

        $connexionbdd = connexionbdd();
        $requete_likes = "SELECT COUNT(id) FROM likes WHERE id_message=$id_message";
        $query_likes = mysqli_query($connexionbdd, $requete_likes);
        $nb_likes = mysqli_fetch_row($query_likes);
       
        echo $likes = $nb_likes[0];
    }

//COMPTE LE NOMBRE DE DISLIKES
function comptedislikes($info_msg)
    {
        $id_message = $info_msg["id"];

        $connexionbdd = connexionbdd();
        $requete_dislikes = "SELECT COUNT(id) FROM dislikes WHERE id_message=$id_message";
        $query_dislikes = mysqli_query($connexionbdd, $requete_dislikes);
        $nb_dislikes = mysqli_fetch_row($query_dislikes); 

        echo $dislikes = $nb_dislikes[0];
    }
//COMPTE LE NOMBRE DE CONVERSATIONS POUR PAGE INDEX QUAND CO
function nbconvco($info_conv)
    {
        $id = $info_conv["id_topic"];
        $connexionbdd = connexionbdd();
        $requete_conv = "SELECT COUNT(id) FROM conversations WHERE id_topic=$id";
        $query_conv = mysqli_query($connexionbdd, $requete_conv);
        $count_conv = mysqli_fetch_all($query_conv, MYSQLI_ASSOC);
        ?>
            <td><?php echo $count_conv[0]["COUNT(id)"];?></td>        
        <?php

        return $count_conv;
    }
//COMPTE LE NOMBRE DE CONVERSATIONS POUR PAGE INDEX QUAND PAS CO
    function nbconvpublic($info_conv)
    {
        $id = $info_conv["id_topic"];
        $connexionbdd = connexionbdd();
        $requete_conv = "SELECT COUNT(id) FROM conversations WHERE id_topic=$id";
        $query_conv = mysqli_query($connexionbdd, $requete_conv);
        $count_conv = mysqli_fetch_all($query_conv, MYSQLI_ASSOC);
        ?>
            <td><?php echo $count_conv[0]["COUNT(id)"];?></td>        
        <?php

        return $count_conv;
    }
//POUR SUPPRIMER DES MESSAGES
function suppressionmessages($info_msg)
    {
        if(isset($_SESSION["id_confidentialite"]) && ($_SESSION["id_confidentialite"]==4 || $_SESSION["id_confidentialite"]==3))
            {                
                ?>
                <button><a href="include/suppression.php?sup_message=<?php echo $info_msg["id"];?>&id_conv=<?= $info_msg["id_conversation"];?>" onclick="return confirm('Supprimer : <?=$info_msg['message'];?> ?')"><img src="image/trash.png" alt="logo poubelle"></a></button>                      
                <?php
            }        
    }
?>