<?php
/**
 * Created by PhpStorm.
 * User: Pierre
 * Date: 06/05/2016
 * Time: 09:51
 */
session_start();
require "../../controllers/Users.php";

$user = new User($_SESSION['user']);
$tab = $user->all_affiche();
var_dump($tab[0]);
var_dump($tab[1]);
var_dump($tab[2]);
session_destroy();
?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>

</head>
<body>

</body>
</html>


