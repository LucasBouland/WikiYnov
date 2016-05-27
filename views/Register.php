<?php
/**
 * Created by PhpStorm.
 * User: Schmurf
 * Date: 06/05/2016
 * Time: 14:18
 */?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <div class="col-xs-12" style="text-align: center;margin-top: 10%">
        <h1>Inscription</h1>
    </div>

    <div class="col-xs-4"></div>
    <div class="col-xs-4" style="text-align: center;margin-top: 5%">
        <form method="post" action="register">
            <div>
                <p>
                    Prénom:
                    <br>
                    <input type="text" name="prenom" required placeholder="Prénom">
                </p>
                <p>
                    Nom:
                    <br>
                    <input type="text" name="nom" required placeholder="Nom">
                </p>
                <p>
                    Adresse mail:
                    <br>
                    <input type="email" name="email" required placeholder="Email">
                </p>
                <p>
                    Mot de passe:
                    <br>
                    <input type="password" name="mdp" required placeholder="Mot de passe">
                </p>

                <p>
                    Confirmation mot de passe:
                    <br>
                    <input type="password" name="confmdp" required placeholder="Retapez votre mot de passe">
                </p>
                <br>
                <button class="btn btn-primary btn-lg" type="submit">Inscription</button>
            </div>

</form>
<a href="index">Page de connexion</a>
</div>