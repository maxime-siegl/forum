<?php
    if (isset($_POST['inscription']))
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
        var_dump($infos_log);
        if (empty($infos_log))
        {
            echo "infos_log check";
            if ($mdp == $conf_mdp)
            {
                echo "mdp et conf";
                $mdpcrypt = password_hash($mdp, PASSWORD_BCRYPT); //cryptage du mdp
                $ajout = "INSERT INTO utilisateurs VALUES (null, '$login', '$mdpcrypt', '$nom', '$prenom', '$mail', 'img', '2')"; // location img, et valeur du membre
                $ajout_query = mysqli_query($bdd, $ajout);
                var_dump($ajout_query);
                var_dump($ajout);
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