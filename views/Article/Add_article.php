<?php
/**
 * Created by PhpStorm.
 * User: Pierre
 * Date: 09/05/2016
 * Time: 09:32
 */
if (!isset($_SESSION['LoggedIn'])) {

    header('Location: /WikYnov/index');
    return;
}
require "../controllers/Articles.php";
?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <form method="post" action="">
        <input type="text" required name="title" class="form-control input-sm chat-input" placeholder="titre de l'article"/>
        <textarea name="article" id="article" cols="30" rows="10"></textarea>
        <button type="submit" >Valider</button>
    </form>
</body>
</html>
