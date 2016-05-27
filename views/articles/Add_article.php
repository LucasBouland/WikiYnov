<?php
if (!isset($_SESSION['LoggedIn'])) {

    header('Location: /WikYnov/index');
    return;
}
/**
 * Created by PhpStorm.
 * User: Pierre
 * Date: 09/05/2016
 * Time: 09:32
 */
$user = User::findById($_SESSION['id']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Wikynov</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <script src="ckeditor/ckeditor.js"></script>
    <script src="ckeditor/samples/js/sample.js"></script>
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
                <li><a href="view">Articles</a></li>
                <li class="active"><a href="">Ajout d'article</a></li>
                <li style="float: right"><a href="logout">deconnexion</a></li>
            </ul>
        </div>
    </div><!-- /.container-fluid -->
</nav>
<!--        fin du header -->
    <form method="post" action="add">
            <div class="col-xs-4"></div>
            <div class="col-xs-4">
                <input type="text" required name="title" class="form-control input-sm chat-input" placeholder="titre de l'article"/></div>

        <br><br>
        <div class="col-xs-4 col-xs-offset-3">
        <select required name="theme" class="selectpicker btn-info" style="width: 90%;float: right;" aria-required="true">
            <option value="" selected disabled>-- Catégorie --</option>
            <option value="1">theme 1</option>
            <option value="2">theme 2</option>
            <option value="3">theme 3</option>
            <option value="4">theme 4</option>
        </select>
        </div>
        <br><br>
            <div class="col-xs-3"></div>
            <div class="col-xs-6">
                <div class="adjoined-bottom">
                    <div class="grid-container">
                        <div class="grid-width-100">
                            <textarea name="article" id="editor" cols="30" rows="10" required></textarea>
                        </div>
                    </div>
                </div></div></div>
            <div class="col-xs-12" style="text-align: center">
                <br><br><br>
                <button type="submit" class="btn btn-primary btn-lg" >poster l'article</button></div></div>
        </form>

<script>
    initSample();
</script>
</body>
</html>