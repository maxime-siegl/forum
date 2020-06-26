<?php
    if (isset($_POST['connexion']))
    {
        echo "connexion?";
        $login = $_POST['login'];
        $mdp = $_POST['mdp'];

        //recup info log
        $info_log = "SELECT * FROM utilisateurs WHERE login = '$login' ";
        $info_log_query = mysqli_query($bdd, $info_log);
        $infos_log = mysqli_fetch_all($info_log_query, MYSQLI_ASSOC);

        $mdp_log = $infos_log[0]['mdp']; // mdp du log
        var_dump($mdp);
        var_dump($mdp_log);
        
        if (!empty($infos_log))
        {
            if (password_verify($mdp, $mdp_log))
            {
                $_SESSION['login'] = $infos_log[0]['login'];
                $_SESSION['mdp'] = $infos_log[0]['mdp'];
                $_SESSION['id'] = $infos_log[0]['id'];
                header('location:index.php');
            }
            else
            {
                $message_erreur = "Mot de passe ne correspond pas celui dans notre base de données!";
            }
        }
        else
        {
            $message_erreur = "Ce login n'existe pas chez nous!";
        }
    }
?>