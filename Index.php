    <?php

        /**
         * Created by PhpStorm.
         * User: Pierre
         * Date: 04/05/2016
         * Time: 09:26
         */

    session_start();
    var_dump( $_SESSION["user"]);

            if (!isset($_SESSION["user"])) {
                header("Location: http://localhost/PHP/WikYnov/controllers/connexion.php");

            } else if (isset($_SESSION["user"])) {
                header("Location: http://localhost/PHP/WikYnov/views/Acceuil.php");
            }





