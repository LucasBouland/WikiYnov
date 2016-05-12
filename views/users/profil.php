<?php
$user =  $_SESSION['user'];
    var_dump($user);
?>
<div>

    <a href="Home">Home</a>
    <h1>Profil</h1>
    <br>
    Prénom : <?php $user->getFirstName(); ?>
    <br>
    Nom : <?= $user->getName(); ?>
    <br>
    adresse mail : <?= $user->getEmail(); ?>
    <br>
    Fonction : <?= $user->getJob(); ?>
    <br>

    <a href="Home">Home</a>
    <br>
    <a href="logout">deconnexion</a>

</div>