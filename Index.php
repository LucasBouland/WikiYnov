<?php
error_reporting(E_ALL);
ini_set("display_error",1);
session_start();

require_once 'vendor/autoload.php';

require_once 'AltoRouter.php';

require_once 'controllers/Users.php';

require_once 'models/User.php';

$db = new coDB();
$router = new AltoRouter();
$router->setBasePath('/WikYnov');

$router->map('GET', '/', function() { require_once 'views/users/connexion.php';});

$router->map('GET', '/index', function() { require 'views/users/connexion.php';});// temp

$router->map('POST','/connexion', function(){ $user = new Users(); $user->connexion();});
$router->map('GET', '/register', function() {Users::signup();});
$router->map('POST','/z', function() {$user = new Users(); $user->register();});
$router->map('GET', '/Home', function() {Users::home();});
$router->map('GET', '/profil', function() {Users::profil();});
$router->map('GET', '/logout', function() {Users::logout();});

 $router->map('GET', '/profil/[i:id]', function($id){
     Users::profil($id);
 });
// match current request
$match = $router->match();

if( $match && is_callable( $match['target'] ) ) {
    call_user_func_array( $match['target'], $match['params'] );
} else {
    //header( $_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
    echo "404";
}
?>