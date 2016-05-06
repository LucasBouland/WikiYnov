<?php
/**
 * Created by PhpStorm.
 * User: Schmurf
 * Date: 06/05/2016
 * Time: 13:46
 */
Session_start();
Session_destroy();
header('Location:../index.php');
?>