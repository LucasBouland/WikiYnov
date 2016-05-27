<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Wikynov</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
</head>
<body>
    <div class="col-xs-12" style="text-align: center; margin-top: 5%"><h1> WikYnov </h1></div>
</div>
    <div class="col-xs-4"></div>
    <div class="col-xs-4 text-center" style="margin-top: 10%">
        <form method="post" action="connexion">
            <input type="email" required name="mail" class="form-control input-sm chat-input"
                   placeholder="Adresse mail"/><br>
            <input type="password" required name="mdp" class="form-control input-sm chat-input"
                   placeholder="Password"/><br>
            <button class="btn btn-primary btn-lg" type="submit">Connexion</button>
        </form>
        <br>

        <!--    <p name="incorrect" style="visibility: hidden">email ou mot de passe incorrect</p>-->

    <div class="col-xs-4"></div>
    <div class="col-xs-4" style="text-align: center"><a href="register">S'inscrire</a></div>
</body>
</html>
