<?php
$user =  $_SESSION['user'];
    var_dump($user);
?>
<div>
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

    <a href="../WikYnov/index.php?c=users&a=Home">Profil</a>
    <br>
    <a href="../WikYnov/index.php?c=users&a=logout">deconnexion</a>

</div>