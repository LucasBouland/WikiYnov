<?php
/**
 * Created by PhpStorm.
 * User: Pierre
 * Date: 12/05/2016
 * Time: 17:01
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
<!--        debut du header -->
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
                <li><a href="Home">Accueil</a></li>
                <li><a href="profil/<?= $_SESSION['id'];?>">Profil</a></li>
                <li class="active"><a href="">Articles</a></li>
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
<!--        fin du header -->
    <div class="col-xs-3">
            <form action="search" method="post">
            <select name="searching" id="mounth" class="selectpicker btn-info" style="width: 90%;float: right;">
                <option value="hide" disabled>-- Catégorie --</option>
                <option value="0" <?php if($choix==0){echo " selected";}?>>Tous</option>
                <option value="1" <?php if($choix==1){echo " selected";}?>>theme 1</option>
                <option value="2" <?php if($choix==2){echo " selected";}?>>theme 2</option>
                <option value="3" <?php if($choix==3){echo " selected";}?>>theme 3</option>
                <option value="4" <?php if($choix==4){echo " selected";}?>>theme 4</option>
            </select>
                <button class="btn btn-primary btn-md" type="submit" style="float: right">Recherche</button>
            </form>
    </div>
<div class="col-xs-12">
    <?php
    foreach($articles as $art){
        echo "<br><div class='col-xs-8 col-xs-offset-1'><a href=\"affiche/$art->id\"><h2>$art->title</h2></a><div style='float: left'>by $art->auteur</div><br><div name=\"article\" id=\"editor\" class='col-xs-12' style='border: 1px solid; height: 100px;overflow: auto;' readonly>$art->description</div><br><div style='float: right'>$art->date</div></div><br><br><br>";
    } ?>
</div>

</body>
</html>