<?php
    // recup les messages qui ont été signalé
    $signalement = "SELECT * FROM interactions 
    INNER JOIN utilisateurs ON interactions.id_utilisateur = utilisateurs_id WHERE signalement >= 1
    INNER JOIN messages ON interactions.id_message = messages.id ";
?>