<?php
/**
 * Created by PhpStorm.
 * User: Pierre
 * Date: 06/05/2016
 * Time: 09:51
 */
if (!isset($_SESSION['LoggedIn'])) {

    header('Location: /WikYnov/index');
    return;
}
$tab = Article::three_affiche();
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
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand"><span class="glyphicon glyphicon-user"></span><div  style="font-size: small; float: right;margin-left: 10px;"> connected as <br><?php echo $user->getFirstName() . " " . $user->getName();?></div></a>
        </div>


        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="">Accueil</a></li>
                <li><a href="profil/<?= $_SESSION['id'];?>">Profil</a></li>
                <li><a href="view">Articles</a></li>
                <?php
                if($user->getJob()!= "abonne"){
                    echo "<li><a href=\"ajoute\">Ajout d'article</a></li>";
                }
                ?>
                <li style="float: right"><a href="logout">deconnexion</a></li>
            </ul>
        </div>
    </div><!-- /.container-fluid -->
</nav>

    <div class="col-xs-3" style="margin-left: 50px">
            <a href='affiche/<?php echo $tab[0]->id?>'><h2 class="col-xs-12" style="text-align: center"><?php echo $tab[0]->title ?></h2></a>
            <br>
            <div style='float: left'>by <?php echo $tab[0]->auteur ?></div>
            <br>
            <div name=\"article\" id=\"editor\" class='col-xs-12' style='border: 1px solid; height: 400px;overflow: auto;' readonly><?php echo $tab[0]->description; ?></div>
            <br>
            <div style='float: right'><?php echo $tab[0]->date ?></div>
        </div>
    </div>
    <div class="col-xs-3 col-xs-offset-1">
            <a href='affiche/<?php echo $tab[1]->id?>'><h2 class="col-xs-12" style="text-align: center"><?php echo $tab[1]->title ?></h2></a>
            <br>
            <div style='float: left'>by <?php echo $tab[1]->auteur?></div>
            <br>
            <div name=\"article\" id=\"editor\" class='col-xs-12' style='border: 1px solid; height: 400px;overflow: auto;' readonly><?php echo $tab[1]->description ?></div>
            <br>
            <div style='float: right'><?php echo $tab[1]->date?></div>
        </div>
    <div class="col-xs-3 col-xs-offset-1">
            <a href='affiche/<?php echo $tab[2]->id?>'><h2 class="col-xs-12" style="text-align: center"><?php echo $tab[2]->title ?></h2></a>
            <br>
            <div style='float: left'>by <?php echo $tab[2]->auteur?></div>
            <br>
            <div name=\"article\" id=\"editor\" class='col-xs-12' style='border: 1px solid; height: 400px;overflow: auto;' readonly><?php echo $tab[2]->description ?></div>
            <br>
            <div style='float: right'><?php echo $tab[2]->date?></div>
    </div>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>
</html>
