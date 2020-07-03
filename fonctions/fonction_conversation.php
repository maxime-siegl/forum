<?php
require_once 'fonctions/fonction_global.php';
//FONCTION QUI AFFICHE FORMULAIRE CREATION CONVERSATION SI USER EST CONNECTE
function form_conv()
    {            
        $connexionbdd = connexionbdd();        
       
        $requete_rang = "SELECT * FROM confidentialite";
        $query_rang = mysqli_query($connexionbdd, $requete_rang);
        $rang = mysqli_fetch_all($query_rang, MYSQLI_ASSOC);       
        ?>
            <form action="" method="POST">
                <label for="titre">Titre :</label>
                <input type="text" id="titre" name="titre" required>

                <label for="description">Description :</label>
                <input type="text" id="decription" name="description" required>

                <label for="confidentialite">Visible par :</label>
                        <select name="confidentialite" id="confidentialite" required>
                        <?php
                            foreach($rang as $role => $info_rang)
                                {
                                    ?>
                                    <option value="<?php echo $info_rang["id"];?>"><?php echo $info_rang["rang"];?></option>
                                    <?php
                                }
                        ?>
                        </select>        

                <input type="submit" name="crea_conv" value="Créer">
            </form>
            <?php            
    }
//AFFICHE LA DATE ET L'HEURE
function date_conv($info_conv)
    {
        $date = explode(" ", $info_conv["date"]);
        $jour = $date[0];
        $heure = $date[1];
    
        echo "Créée le " . $jour . " à " . $heure;
    }
//COMPTE LE NB DE MSG DE LA CONVERSATION
function count_message($info_conv)
    {
        $id = $info_conv["id"];
        $connexionbdd = connexionbdd();
        $requete_message = "SELECT COUNT(id) FROM messages WHERE id_conversation=$id";
        $query_message = mysqli_query($connexionbdd, $requete_message);
        $count_message = mysqli_fetch_all($query_message, MYSQLI_ASSOC);
        ?>
            <td><?php echo $count_message[0]["COUNT(id)"];?></td>        
        <?php

        return $count_message;
    }
//AFFICHE LE DERNIER MESSAGE POSTE DE LA CONVERSATION
function dernier_msg($id_conversation)
    {        
        $connexionbdd = connexionbdd();

        $requete_max_id = "SELECT MAX(id) FROM messages WHERE id_conversation=$id_conversation";
        $query_requete_max_id = mysqli_query($connexionbdd, $requete_max_id);
        $resultat_max_id = mysqli_fetch_all($query_requete_max_id, MYSQLI_ASSOC);
        $max_id = $resultat_max_id[0]["MAX(id)"];

        if(!empty($max_id))
            {
                $requete_last_msg = "SELECT message,date, login FROM utilisateurs INNER JOIN messages ON messages.id_utilisateur=utilisateurs.id WHERE id_conversation=$id_conversation AND messages.id=$max_id";
                $query_last_msg = mysqli_query($connexionbdd, $requete_last_msg);
                $last_msg = mysqli_fetch_all($query_last_msg, MYSQLI_ASSOC);                
                ?>
                <td><?php echo $last_msg[0]["login"];?> : <?php echo $last_msg[0]["message"];?></td>
                <?php
            }
        else
            {
                ?>
                <td></td>            
                <?php
            }                
    }
function suppressionconversation($info_conv)
    {
        if(isset($_SESSION["id_confidentialite"]) && $_SESSION["id_confidentialite"]==4)
            {
                ?>
                <td><button><a href="include/suppression.php?sup_conv=<?php echo $info_conv["id"];?>" onclick="return confirm('Supprimer : <?=$info_conv['titre'];?> ?')"><img src="image/trash.png" alt="logo poubelle"></a></button></td>                                                  
                <?php
            }        
    }
?>
