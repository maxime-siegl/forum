<?php
    // recup nom prenom mail et le nombre de conv créés et le nombre de message posté
    if (isset($_GET['id_posteur']) && !empty($_GET['id_posteur']))
    {
        $id_posteur = $_GET['id_posteur'];
    }
?>