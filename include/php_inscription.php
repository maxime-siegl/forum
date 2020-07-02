<?php
    if (isset($_POST['inscription']) && !empty($_POST['login']) && !empty($_POST['mdp']) && !empty($_POST['nom']) && !empty($_POST['prenom'] && !empty($_POST['mail']))
    {
        $login = $_POST['login'];
        $mdp = $_POST['mdp'];
        $conf_mdp = $_POST['confirmation_mdp'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $mail = $_POST['mail'];

        //verif log existant
        $all = "SELECT * FROM utilisateurs WHERE login = '$login'";
        $all_query = mysqli_query($bdd, $all);
        $infos_log = mysqli_fetch_all($all_query, MYSQLI_ASSOC);
        
        if (empty($infos_log))
        {
            if ($mdp == $conf_mdp)
            {   
                $mdpcrypt = password_hash($mdp, PASSWORD_BCRYPT); //cryptage du mdp
                $ajout = "INSERT INTO utilisateurs (login, mdp, nom, prenom, mail) VALUES ('$login', '$mdpcrypt', '$nom', '$prenom', '$mail')";
                $ajout_query = mysqli_query($bdd, $ajout);
                header('location:connexion.php');
            }
            else
            {
                $message_erreur = "Les mots de passes ne sont pas semblables!";
            }
        }
        else
        {
            $message_erreur = "Login déjà existant!";
        }
    }
    else
    {
        $message_erreur = "appuyer sur le bouton";
    }
?>