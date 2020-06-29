<?php
//FONCTION QUI AFFICHE FORMULAIRE CREATION CONVERSATION SI USER EST CONNECTE
function form_conv()
    {                        
        ?>
            <form action="" method="POST">
                <label for="titre">Titre :</label>
                <input type="text" id="titre" name="titre" required>

                <label for="description">Description :</label>
                <input type="text" id="decription" name="description" required>

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
function dernier_msg()
    {
        $connexionbdd = connexionbdd();
        $requete_last_msg = "SELECT * FROM messages WHERE date=MAX(date)";
        $query_last_msg = mysqli_query($connexionbdd, $requete_last_msg);
        $last_msg = mysqli_fetch_all($query_last_msg, MYSQLI_ASSOC);
        
        var_dump($last_msg);
    }

