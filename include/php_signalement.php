<?php
    if (isset($_SESSION['id_confidentialite']) && $_SESSION['id_confidentialite'] == 3 || $_SESSION['id_confidentialite'] == 4)
    {
        // recup les messages qui ont été signalé
        $signalement = "SELECT login, date, message, id_message, messages.id_utilisateur FROM signalements 
                        INNER JOIN utilisateurs ON signalements.id_utilisateur = utilisateurs.id 
                        INNER JOIN messages ON signalements.id_message = messages.id 
                        GROUP BY id_message"; // recup ... en fusionnant où id_message est =
        $signalement_query = mysqli_query($bdd, $signalement);
        $msg_signal = mysqli_fetch_all($signalement_query, MYSQLI_ASSOC);

        //var_dump($msg_signal);

        if (isset($_GET['id_alerte']) && !empty($_GET['id_alerte'])) // traitement de l'alerte
        {
            $id_alerte = $_GET['id_alerte'];
            $supalerte = "DELETE FROM signalements WHERE id_message = '$id_alerte' ";
            $supalerte_query = mysqli_query($bdd, $supalerte); 
            header('location:moderation.php');
        }
        else if (isset($_GET['id_msg']) && !empty($_GET['id_msg'])) // traitement du msg
        {
            $id_msg = $_GET['id_msg'];
            $supmsg = "DELETE FROM messages WHERE id = '$id_msg' ";
            $supmsg_query = mysqli_query($bdd, $supmsg);
            header('location:moderation.php');
        }

        foreach ($msg_signal as $info => $info_msg)
        {          
            echo '<tr>';
            ?>
            <td><a href="membre.php?id_posteur=<?php echo $info_msg["id_utilisateur"];?>"><?php echo $info_msg["login"];?></a></td>
            <?php
            echo '<td>'. $info_msg['date'] .'</td>';
            echo '<td>'. $info_msg['message'] .'</td>';
            echo '<td>'.'<a href="moderation.php?id_msg='.$info_msg['id_message'].'"><img src="https://img.icons8.com/ios/40/000000/delete-message.png"/></a>'.'</td>';
            echo '<td>'.'<a href="moderation.php?id_alerte='.$info_msg['id_message'].'"><img src="https://img.icons8.com/wired/40/000000/no-reminders.png"/></a>'.'</td>';
            echo '</tr>';
        }        
    }
?>