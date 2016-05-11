<?php

require './models/User.php';

class Users
{
    /* gere la connexion au site*/
    public function connexion()
    {
        if (!empty($_POST['mail']) && !empty($_POST['mdp'])) {
            $email = $_POST["mail"];
            $password = $_POST["mdp"];
            if (User::exists($email, $password)) {
                $user = User::findByCredentials($email, $password);
                $_SESSION['user'] = $user;
                $_SESSION['LoggedIn'] = true;
                var_dump($_SESSION['user']); // objet, est perdu apres?? (1)
// header("Location: ../index.php?c=users&a=home");

                header("Location: index.php?c=users&a=home");
            } else "email ou mot de passe incorrect";
        }
        require 'views/users/connexion.php';

        //require 'views/Home.php';

        //header('Location:../../index.php');
    }
    /* gere le php du profil */
    public function profil()
    {
        var_dump($_SESSION['user']);

        if (!isset($_SESSION['LoggedIn'])) {
            header("Location: index.php");
        }

       //$_SESSION['user'] =  User::findById($_SESSION['user']['id']);

        require 'views/users/profil.php';
    }
    /* redirection page d'accueil*/
    public function home()
    {
       // var_dump($_SESSION['user']); // ici l'objet est perdu -> object(__PHP_Incomplete_Class) (3)
        require 'views/Home.php';

    }
    /* logout + redirection vers connexion */
    public function logout()
    {
        Session_destroy();
        require 'views/users/connexion.php';
        header("Location: index.php?c=users&a=connexion");
    }

    public function register()
    {
        require 'views/Register.php';

        if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email']) && !empty($_POST['mdp']) && !empty($_POST['confmdp'])) {
            if ($_POST['confmdp'] == $_POST['mdp']) {
                $email = $_POST['email'];
                $validDomain = array('ynov.com');
                if (filter_var($email, FILTER_VALIDATE_EMAIL))
                {
                   $explodedEMAIL = explode('@', $email);
                    $domain = array_pop($explodedEMAIL);
                    if (!in_array($domain, $validDomain))
                    {
                        echo "domaine de mail non valide";
                        return;
                    }
                }
                if (strlen($_POST['mdp']) > 8)
                {
                    $alreadyExist = User::checkAvailable($_POST['email']);
                    if ($alreadyExist > 0)
                    {
                        echo 'Echec de l\'inscription: cette adresse mail est déja enregistrée.';
                    }
                    else
                    {
                        User::create($_POST['prenom'], $_POST['nom'], $_POST['email'], $_POST['mdp']);
                        echo 'Inscription réussite';
                        require 'views/users/connexion.php';
                        header("Location: index.php?c=users&a=connexion");
                    }
                }
                else
                {
                    echo "echec, mot de passe 8 lettres minimum";
                }
            }
            else {
                echo 'Echec de l\'inscription:les champs mot de passe et Confirmation mot de passe ne sont pas les mêmes.';
            }
        } else {
            echo 'Echec de l\'inscription: vous avez omis un champs.';
        }
    }
}