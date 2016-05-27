<?php
/**
 * Created by PhpStorm.
 * User: Schmurf
 * Date: 06/05/2016
 * Time: 11:06
 *
 */
if (!isset($_SESSION['LoggedIn'])) {

    header('Location: /WikYnov/index');
    return;
}
$user = User::findById($_SESSION['id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Wikynov</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand"><span class="glyphicon glyphicon-user"></span><div  style="font-size: small; float: right;margin-left: 10px;"> connected as <br><?php echo $user->getFirstName() . " " . $user->getName();?></div></a>
        </div>


        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="../Home">Accueil</a></li>
                <li class="active"><a href="">Profil</a></li>
                <li><a href="../view">Articles</a></li>
                <?php
                if($user->getJob()!= "abonne"){
                    echo "<li><a href=\"../ajoute\">Ajout d'article</a></li>";
                }
                ?>
                <li style="float: right"><a href="../logout">deconnexion</a></li>
            </ul>
        </div>
    </div><!-- /.container-fluid -->
</nav>

    <div class="col-xs-12" style="text-align: center">
        <h1>Profil</h1></div>
    <br>
    <div class="col-xs-12" style="text-align: center"><p>
            Prénom : <?= $user->getFirstName(); ?></p></div>
    <br>
    <div class="col-xs-12" style="text-align: center"><p>
            Nom : <?= $user->getName(); ?></p></div>
    <br>
    <div class="col-xs-12" style="text-align: center"><p>
            adresse mail : <?= $user->getEmail(); ?></p></div>
    <br>
    <div class="col-xs-12" style="text-align: center"><p>
            Fonction : <?= $user->getJob(); ?></p></div>