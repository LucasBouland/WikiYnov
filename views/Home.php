<?php
/**
 * Created by PhpStorm.
 * User: Pierre
 * Date: 06/05/2016
 * Time: 09:51
 */
if (isset($_SESSION['LoggedIn']) == true)
{

}
else
{
   // header("Location: ../index.php");
}
var_dump($_SESSION['user']);
?>
page accueil
<br>
<a href="../../index.php?c=users&a=profil">Profil</a>
<br>
<a href="../../index.php?c=users&a=logout">deconnexion</a>


