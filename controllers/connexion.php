<?php
/**
 * Created by PhpStorm.
 * User: Pierre
 * Date: 04/05/2016
 * Time: 10:55
 */
require "../views/Connexion.php";
require "../core/coDB.php";
session_start();
$db = new coDB();
if(!empty($_POST['mail']) && !empty($_POST['mdp'])){
    $email = $_POST["mail"];
    $password = $_POST["mdp"];
    $data = $db->pdo_query('SELECT COUNT(email) AS total FROM users WHERE email = :mail AND password = :password;', [':mail' => $email,':password' => $password]);
    if($data[0]->total == '1') {
        require "../models/User.php";
        $data = $db->pdo_query('SELECT * FROM users WHERE email = ? AND password = ?;', [$email,$password]);
        $user = new User($data[0]->id_user,$data[0]->name,$data[0]->last_name,$data[0]->job,$data[0]->password,$data[0]->email);
        $_SESSION['user'] = $user;

        header("Location: http://localhost/PHP/WikYnov/Index.php");
    }
    else "email ou mot de passe incorrect";
    //document.getElementById(MatFabrication).style.visibility=(true)?'visible':'visible';
}