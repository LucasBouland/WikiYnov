<?php
/**
 * Created by PhpStorm.
 * User: Pierre
 * Date: 13/05/2016
 * Time: 13:53
 */
if (!isset($_SESSION['LoggedIn'])) {

    header('Location: /WikYnov/index');
    return;
}
?>
Article deleted
<form action="../Home" method="get">
<button class="btn btn-primary btn-md" type="submit" style="float: right">Retour à l'accueil</button>
</form>