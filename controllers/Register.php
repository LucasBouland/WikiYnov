<?php
/**
 * Created by PhpStorm.
 * User: Schmurf
 * Date: 06/05/2016
 * Time: 14:42
 */

require "../views/Connexion.php";
require "../core/coDB.php";

session_start();

$db = new coDB();

if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email']) && !empty($_POST['mdp']) && !empty($_POST['confmdp'])) {
    if ($_POST['confmdp'] == $_POST['mdp']) {
        $stmt = $db->prepare('INSERT INTO users SET name = :nom, last_name = :prenom, email = :email,password = :mdp, job = :job, connected = :connected' );
        /*On lie nos variables à nos paramètres entrés dans la requête*/
        $stmt->bindParam(':nom', $_POST['nom'], PDO::PARAM_STR, 255);
        $stmt->bindParam(':prenom', $_POST['prenom'], PDO::PARAM_STR, 255);
        $stmt->bindParam(':email', $_POST['email'], PDO::PARAM_STR, 255);
        $stmt->bindParam(':mdp', $_POST['mdp'], PDO::PARAM_STR, 255);
        $stmt->bindParam( ':job', $_POST['job'], PDO::PARAM_STR, 255);
        $stmt->bindParam( ':connected', $_POST['connected'], PDO::PARAM_STR, 255);
        /*Lancement de la requête sql*/
        $stmt->execute();
        echo 'Inscription réussite';
    }else {
        echo 'Echec de l\'inscription:les champs mot de passe et Confirmation mot de passe ne sont pas les mêmes.';
        header('Location:/test/views/other_pages/inscription.html');
    }
} else {
    echo 'Echec de l\'inscription: vous avez omis un champs.';
    header('Location:/test/views/other_pages/inscription.html');
}
