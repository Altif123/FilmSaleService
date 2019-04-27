<?php
/**
 * Created by PhpStorm.
 * User: Altif Ali
 * Date: 23/04/2019
 * Time: 16:03
 */
session_start();
if (isset($_SESSION['loggedIn'])) {
    session_destroy();

}
header("Location:../View/login.php");