<?php
    //recup des infos du log
    $infos = "SELECT * FROM utilisateurs WHERE login = '".$_SESSION['login']."' "; // ajouter les requettes pour recup les topic et conversation où le log figure
    $infos_query = mysqli_query($bdd, $infos);
    $full_info = mysqli_fetch_all($infos_query, MYSQLI_ASSOC);
    
    var_dump($full_info);
    var_dump($full_info[0]['nom']);
    
    if (isset($_POST['modification']) && !empty($_POST['login']) && !empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['mail']) && !empty($_POST['mdp_actuel']))
    {
        var_dump('toutes infos demandées ok!');
        $log = $_POST['login'];
        $mdp = $_POST['mdp'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $mail = $_POST['mail'];
        
        //verif log
        $logins = "SELECT * FROM utilisateurs WHERE login = $log";
        $logins_query = mysqli_connect($bdd, $logins);
        $logins_result = mysqli_fetch_all($logins_query, MYSQLI_ASSOC);

        if (empty($logins_result))
        {
            var_dump('login ok');
            // verif du mdp actuel par rapport a la bdd
            if (password_verify($mdp, $full_info[0]['mdp']))
            {
                var_dump('mdp ok (bdd ok)');
                // modif possible de tout les champs excepté new mdp
                $infos_update = "UPDATE utilisateurs SET 'login' = '$log', 'nom' = '$nom', 'prenom' = '$prenom', 'mail' = '$mail' ";
                $infosup_query = mysqli_query($bdd, $infos_update);
                $info_modif = mysqli_fetch_all($infosup_query, MYSQLI_ASSOC);

                $_SESSION['login'] = $log;

                if (isset($_POST['new_mdp']))
                {
                    var_dump('new mdp ok');
                    $new_mdp = $_POST['new_mdp'];
                    $conf_newmdp = $_POST['confirmation_newmdp'];
                    if ($new_mdp == $conf_newmdp)
                    {
                        var_dump('new mdp = conf new mdp');
                        $new_crypt = password_hash($new_mdp, PASSWORD_BCRYPT);
                        $modif_mdp = "UPDATE utilisateurs SET 'mdp' = '$new_crypt' ";
                        $mdpup_query = mysqli_query($bdd, $modif_mdp);

                        $_SESSION['mdp'] = $new_mdp;
                    }
                    else
                    {
                        echo 'modif mdp ?';
                    }
                }
                else
                {
                    echo "pas de new mdp";
                }
            }
            else
            {
                echo "mdp et mdp de bdd pas =";
            }
        }
        else
        {
            echo 'log deja pris';
        }
    }
    else
    {
        echo 'remplir tout les champs requis';
    }
?>