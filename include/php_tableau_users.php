<?php
        if (isset($_SESSION['id_confidentialite']) && $_SESSION['id_confidentialite'] == 3)
        {            
            foreach ($recup_users as $user => $infos_user)
            {                           
                echo '<tr>';
                ?>
                <td><a href="membre.php?id_posteur=<?php echo $infos_user["id"];?>"><?php echo $infos_user["login"];?></a></td>
                <?php
                echo '<td>'. $infos_user['nom'] .'</td>';
                echo '<td>'. $infos_user['prenom'] .'</td>';
                echo '<td>'. $infos_user['rang'] .'</td>';
                echo '</tr>';                
            }
        }
        elseif (isset($_SESSION['id_confidentialite']) && $_SESSION['id_confidentialite'] == 4)
        {            
            foreach ($recup_users as $user => $infos_user)
            {               
                echo '<tr id="'.$infos_user['id'].'">';
                ?>
                <td><a href="membre.php?id_posteur=<?php echo $infos_user["id"];?>"><?php echo $infos_user["login"];?></a></td>
                <?php
                echo '<td>'. $infos_user['nom'] .'</td>';
                echo '<td>'. $infos_user['prenom'] .'</td>';
                echo '<td>';
                
    ?>
                <a href="moderation.php?id_log=<?php echo $infos_user['id']?>#<?php echo $infos_user['id']; ?>"> 
                    <?php echo $infos_user['rang']; ?>
                </a>
    <?php  
                if (isset($_GET['id_log']) && !empty($_GET['id_log']))
                {
                    if ($_GET['id_log'] == $infos_user['id'])
                    {
                        $id_log = $_GET['id_log'];
    ?>
                        <form action="" method="POST">
                            <select name="rang" id="rang">
                                <option value=""><?php echo $infos_user['rang']; ?></option>
                                <option value="2">Simple Membre</option>
                                <option value="3">Modérateur</option>
                                <option value="4">Admin</option>
                            </select>
                            <button type="submit" name="modifier_rang">Modifier le Rang</button>
                        </form>
    <?php
                        if (isset($_POST['modifier_rang']) && !empty($_POST['rang']))
                        {
                            $rang = $_POST['rang'];
                            $id = $infos_user['id'];
                            // var_dump($rang);
                            // var_dump($id);
                            $modif_rang = "UPDATE utilisateurs SET id_confidentialite = '$rang' WHERE id = '$id' "; // modif le rang
                            $rang_query = mysqli_query($bdd, $modif_rang);
                            header("location:moderation.php");
                        }
                    }
                }
                echo '</td>'; // envoie en get de l'id pour modif le bon rang
                echo '<td>';
    ?>            
                <button><a href="moderation.php?id_user=<?php echo $infos_user['id']; ?>" onclick="return confirm('Supprimer <?=$infos_user['login'];?>?')"><img src="https://img.icons8.com/wired/40/000000/delete-sign.png"/></a></button>
                
    <?php
                if (isset($_GET['id_user']) && !empty($_GET['id_user']))
                {
                    if($_GET['id_user'] == $infos_user['id'])
                    {
                        $id_user = $_GET['id_user'];
                        //modif l'id message du membre del pour le passer à l'admin
                        // change id utilisateur topic
                        $change_id_topic = "UPDATE topics SET id_utilisateur = '1' WHERE id_utilisateur = '$id_user' ";
                        $chage_id_topic_query = mysqli_query($bdd, $change_id_topic);

                        // change id utilisateur conversation
                        $change_id_conv = "UPDATE conversations SET id_utilisateur = '1' WHERE id_utilisateur = '$id_user'";
                        $chage_id_conv_query = mysqli_query($bdd, $change_id_conv);

                        // change id utilisateur message
                        $change_id_mess = "UPDATE messages SET id_utilisateur = '1' WHERE id_utilisateur = '$id_user' ";
                        $chage_id_mess_query = mysqli_query($bdd, $change_id_mess);

                        // delete le membre
                        $delete = "DELETE FROM utilisateurs WHERE id = $id_user";
                        $delete_query = mysqli_query($bdd, $delete);
                        header("location:moderation.php");
                    }
                }
                echo '</td>'; // envoie en get id pour sur la bonne personne
                echo '</tr>';
            }           
        }       
?>