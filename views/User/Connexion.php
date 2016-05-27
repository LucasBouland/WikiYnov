<?php
/**
 * Created by PhpStorm.
 * User: Schmurf
 * Date: 04/05/2016
 * Time: 09:58
 */
require "../../controllers/connexion.php";


/*
session_start();
if(!empty($_POST['mail']) && !empty($_POST['mdp'])){

    $email = $_POST["mail"];
    $password = $_POST["mdp"];
    $user = new User();
    $user->connection($email,$password);
    var_dump($user);
    //$user->update(1,"fehz","ezhjui","re","eafrzfds","rtyuu");
    //var_dump($user);
}*/




?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<div>
    <form method="post" action="">
        <input type="email" required name="mail" class="form-control input-sm chat-input"
               placeholder="Adresse mail"/>
        <input type="password" required name="mdp" class="form-control input-sm chat-input"
               placeholder="Password"/>
        <button type="submit" >Connexion</button>
    </form>
<!--    <p name="incorrect" style="visibility: hidden">email ou mot de passe incorrect</p>-->
</div>
</body>
</html>
