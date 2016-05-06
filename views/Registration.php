<?php
/**
 * Created by PhpStorm.
 * User: Schmurf
 * Date: 06/05/2016
 * Time: 14:18
 */?>

<h1>S'inscire</h1>

<form method="post" action="">
    <div>
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
        <button type="submit">Inscription</button>
    </div>
</form>
