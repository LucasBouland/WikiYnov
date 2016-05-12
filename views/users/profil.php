<?php

if (!isset($_SESSION['LoggedIn'])) {

    header('Location: /WikYnov/index');
    return;
}
$user = User::findById($_SESSION['id']);
var_dump($user);
?>
<div>

    <a href="Home">Home</a>
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

    <a href="../Home">Home</a>
    <br>
    <a href="logout">deconnexion</a>

</div>