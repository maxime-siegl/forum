<?php
    if (isset($_POST['inscription']))
    {
        $login = $_POST['login'];
        $mdp = $_POST['mdp'];
        $conf_mdp = $_POST['confirmation_mdp'];

        //verif log existant
        $all = "SELECT * FROM utilisateurs WHERE login = '$login'";
        $all_query = mysqli_query($bdd, $all);
        $infos_log = mysqli_fetch_all($all_query, MYSQLI_ASSOC);

        if (empty($info_log))
        {
            if ($mdp == $conf_mdp)
            {
                $mdpcrypt = password_hash($mdp, PASSWORD_BCRYPT); //cryptage du mdp
                $ajout = "INSERT INTO utilisateurs VALUES (null, '$login', '$mdpcrypt', '', '1')";
                $ajout_query = mysqli_query($bdd, $ajout);
                //header('location:connexion.php');
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