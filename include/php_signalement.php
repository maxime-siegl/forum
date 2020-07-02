<?php
    if (isset($_SESSION['id_confidentialite']) && $_SESSION['id_confidentialite'] == 3 || $_SESSION['id_confidentialite'] == 4)
    {
        // recup les messages qui ont été signalé
        $signalement = "SELECT * FROM interactions INNER JOIN utilisateurs ON interactions.id_utilisateur = utilisateurs.id INNER JOIN messages ON interactions.id_message = messages.id WHERE signalement >= 1";
        $signalement_query = mysqli_query($bdd, $signalement);
        $msg_signal = mysqli_fetch_all($signalement_query, MYSQLI_ASSOC);

        var_dump($msg_signal);
    }
?>