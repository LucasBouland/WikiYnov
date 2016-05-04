<?php
/**
 * Created by PhpStorm.
 * User: Schmurf
 * Date: 04/05/2016
 * Time: 09:58
 */?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<div>
    <form method="post" action="/test/controllers/connexion.php">
        <input type="pseudo" required name="pseudo" class="form-control input-sm chat-input"
               placeholder="Pseudo"/>
        <input type="password" required name="mdp" class="form-control input-sm chat-input"
               placeholder="Password"/>
        <br>
        <button type="submit" >Connexion</button>
    </form>
</div>
</body>
</html>
