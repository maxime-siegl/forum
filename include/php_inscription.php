<?php
    if(isset($_POST['inscription']))
    {
        $login = $_POST['login'];
        $mdp = $_POST['mdp'];
        $confirmation = $_POST['confirmation_mdp'];
        $message_erreur = "";
        //verif du log
        $bdd = mysqli_connect("localhost", "root", "", "forum");
        $all = " SELECT * FROM utilisateurs WHERE login = '$login' ";
        $all_query = mysqli_query($bdd, $all);
        $info_all = mysqli_fetch_all($info_all, MYSQLI_ASSOC);

        if (empty($info_all))
        {
            if ($mdp == $confirmation)
            {
                //hash du mdp
                $mdpcrypt = password_hash($mdp, PASSWORD_BCRYPT);
                $ajout = " INSERT INTO utilisateur VALUES (null, '$login', '$mdpcrypt')";
                $ajout_query = mysqli_query($bdd, $ajout);
                header('location:connexion');
            }
            else
            {
                $message_erreur = "les mots de passes ne sont pas identiques";
            }
        }
        else
        {
            $message_erreur = "le login est déjà pris";
        }
    }
?>