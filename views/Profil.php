<?php
/**
 * Created by PhpStorm.
 * User: Schmurf
 * Date: 06/05/2016
 * Time: 11:06
 *
 */

require "../models/User.php";
session_start();

$user = $_SESSION['user'];
?>


<div>
    <h1>Profil</h1>
    <br>
    Prénom : <?= $user->getFirstName(); ?>
    <br>
    Nom : <?= $user->getName(); ?>
    <br>
    adresse mail : <?= $user->getEmail(); ?>
    <br>
    Fonction : <?= $user->getJob(); ?>
    <br>

    <a href="../Index.php">Retour page d'accueil</a>

</div>