<?php
//FONCTION QUI COMPTE LE NBR DE CONV PAR TOPIC + AFFICHE UN TD AVEC CE NOMBRE
function count_conv($info_topic)
    {
        $id = $info_topic["id"];
        $connexionbdd = connexionbdd();
        $requete_conv = "SELECT COUNT(id) FROM conversations WHERE id_topic=$id";
        $query_conv = mysqli_query($connexionbdd, $requete_conv);
        $count_conv = mysqli_fetch_all($query_conv, MYSQLI_ASSOC);
        ?>
            <td><?php echo $count_conv[0]["COUNT(id)"];?></td>        
        <?php

        return $count_conv;
    }

//FONCION QUI SEPARE DATE ET HEURE DE CREATION DE TOPIC
function date_topic($info_topic)
    {
        $date = explode(" ", $info_topic["date"]);
        $jour = $date[0];
        $heure = $date[1];
    
        echo $jour . " à " . $heure;
    }

//FONCTION QUI AFFICHE LE FORMULAIRE D'AJOUT TOPIC SI USER = ADMIN OU MODO
function form_topic($rang)
    {
        if(isset($_SESSION["id_confidentialite"]) && ($_SESSION["id_confidentialite"]==3 || $_SESSION["id_confidentialite"]==4))
                {                    
                    ?>
                    <form action="topic.php" method="POST" id="form_topic">
                        <label for="titre">Titre :</label>
                        <input type="text" id="titre" name="titre" required>

                        <label for="description" >Description :</label>
                        <input type="text" id="description" name="description" required>

                        <label for="acces">Visible par :</label>
                        <select name="acces" id="acces" required>
                        <?php
                            foreach($rang as $role => $info_rang)
                                {
                                    ?>
                                    <option value="<?php echo $info_rang["id"];?>"><?php echo $info_rang["rang"];?></option>
                                    <?php
                                }
                        ?>
                        </select>        
                        
                        <input type="submit" name="ajout_topic" value="Créer">            
                    </form>         
                    <?php
                }    
    }
function suppressiontopic($info_topic)
    {
        if(isset($_SESSION["id_confidentialite"]) && $_SESSION["id_confidentialite"]==4)
            {
                ?>       
                                       
                <td><button><a href="include/suppression.php?sup_topic=<?php echo $info_topic["id"];?>" onclick="return confirm('Supprimer : <?=$info_topic['titre'];?> ?')"><img src="image/trash.png" alt="logo poubelle"></a></button></td>                
                <?php
            }        
    }
?>