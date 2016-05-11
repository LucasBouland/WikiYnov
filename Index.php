<?php

/**
 * Created by PhpStorm.
 * User: Pierre
 * Date: 04/05/2016
 * Time: 09:26
 */

session_start();

/*
if (!isset($_SESSION["user"])) {
    header("Location: ./controllers/connexion.php");

} else if (isset($_SESSION["user"])) {
    header("Location: ./views/Home.php");
}
*/
/* */
if(!empty($_GET['c']) && !empty($_GET['a'])){
    $controller = ucfirst($_GET['c']); // UpperCasefirst, met la 1ere lettre en MAJ
    $action = $_GET['a'];

    // RISQUE DE FAILLE
    $file = 'controllers/' . $controller . '.php';
    /* fait un require avec c = class et a = fonction, routing via index? */
    if(file_exists($file)){
        require $file;
        $c  = new $controller;
        call_user_func([$c, $action]);
    }
}
else
{
    header("Location: index.php?c=users&a=connexion");
}