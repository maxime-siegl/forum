<?php
    //recup des infos du log
    $infos = "SELECT * FROM utilisateurs WHERE login = '".$_SESSION['login']."' "; // ajouter les requettes pour recup les topic et conversation où le log figure
    $infos_query = mysqli_query($bdd, $infos);
    $full_info = mysqli_fetch_all($infos_query, MYSQLI_ASSOC);
    
    
    if (isset($_POST['modification']) && !empty($_POST['login']) && !empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['mail']) && !empty($_POST['mdp_actuel']))
    {
        //var_dump('toutes infos demandées ok!');
        $log = $_POST['login'];
        $mdp_actuel = $_POST['mdp_actuel'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $mail = $_POST['mail'];
        $id = $_SESSION['id'];

        // verif du mdp actuel par rapport a la bdd
        if (password_verify($mdp_actuel, $full_info[0]['mdp']))
        {
            var_dump('mdp ok (bdd ok)');
            // modif possible de tout les champs excepté new mdp
            $infos_update = "UPDATE utilisateurs SET nom = '$nom', prenom = '$prenom', mail = '$mail' WHERE id = $id ";
            $infosup_query = mysqli_query($bdd, $infos_update);
            $_SESSION['nom'] = $nom;
            $_SESSION['prenom'] = $prenom;
            $_SESSION['mail'] = $mail;

            //verif log
            $logins = "SELECT * FROM utilisateurs WHERE login = '$log' ";
            $logins_query = mysqli_query($bdd, $logins);
            $logins_result = mysqli_fetch_all($logins_query, MYSQLI_ASSOC);
            if (empty($logins_result))
            {
                var_dump('login ok');
                $log_up = "UPDATE utilisateurs SET login = '$log' WHERE id = '$id' ";
                $logup_query = mysqli_query($bdd, $log_up);
                $_SESSION['login'] = $log;
            }
            //trouver un message d'erreur... "pas de modif du log car raison volontaire ou déjà pris ?"

            // verif pour new mdp
            if (isset($_POST['new_mdp']) && !empty($_POST['new_mdp']))
            {
                var_dump('new mdp ok');
                $new_mdp = $_POST['new_mdp'];
                $conf_newmdp = $_POST['confirmation_newmdp'];
                if ($new_mdp == $conf_newmdp)
                {
                    var_dump('new mdp = conf new mdp');
                    $new_crypt = password_hash($new_mdp, PASSWORD_BCRYPT);
                    $modif_mdp = "UPDATE utilisateurs SET mdp = '$new_crypt' WHERE id = '$id' ";
                    $mdpup_query = mysqli_query($bdd, $modif_mdp);

                    $_SESSION['mdp'] = $new_crypt;
                    
                }
                else
                {
                    echo 'modif mdp ?';
                }
            }
            // pas de else car pas de modif du mdp volontairement par l'utilisateur
        }
        else
        {
            echo "mdp et mdp de bdd pas =";
        }
    }
    else
    {
        echo 'remplir tout les champs requis';
    }
?>