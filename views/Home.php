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

?>
page accueil
<br>
<a href="profil/<?= $_SESSION['id'];?>">Profil</a>
<br>
<a href="logout">deconnexion</a>