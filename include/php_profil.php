<?php
    //recup des infos du log
    $infos = "SELECT * FROM utilisateurs WHERE login = '$_SESSION['login']' "; // ajouter les requettes pour recup les topic et conversation où le log figure
    $infos_query = mysqli_query($bdd, $infos);
    $full_info = mysqli_fetch_all($infos_query, MYSQLI_ASSOC);
    
    var_dump($full_info);

    
?>