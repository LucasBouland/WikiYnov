<?php

require './models/User.php';

class Users
{
    /* gere la connexion au site*/
    public function connexion()
    {
        if (!empty($_POST['mail']) && !empty($_POST['mdp'])) {
            $email = $_POST["mail"];
            $salt = "trololololo";
            $saltmdp = $_POST['mdp'].$salt;
            $password = sha1($saltmdp);

            var_dump($password);
            if (User::exists($email, $password)) {
                $user = User::findByCredentials($email, $password);
                $_SESSION['user'] = $user;
                $_SESSION['LoggedIn'] = true;
                header('location:Home');

                //self::home();
            } else "email ou mot de passe incorrect";
        }else echo "champs vides";
    }
    /* gere le php du profil */
    public static function profil()
    {

        if (!isset($_SESSION['LoggedIn'])) {
            require 'views/users/connexion.php';
        }
        else{

            require 'views/users/profil.php';
        }
    }
    /* redirection page d'accueil*/
    public static function home()
    {
       // var_dump($_SESSION['user']); // ici l'objet est perdu -> object(__PHP_Incomplete_Class) (3)
        require 'views/Home.php';


    }
    /* logout + redirection vers connexion */
    public static function logout()
    {
        Session_destroy();
        require 'views/users/connexion.php';
        //header("Location:/");
    }

    public static function signup()
    {
        require 'views/Register.php';
    }
    
    public function register()
    {
    

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
                        $salt = "trololololo";
                        $saltmdp = $_POST['mdp'].$salt;
                        $mdp = sha1($saltmdp);
                        User::create($_POST['prenom'], $_POST['nom'], $_POST['email'], $mdp);
                        echo 'Inscription réussite';

                        require 'views/users/connexion.php';

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