<?php
/**
 * Created by PhpStorm.
 * User: Altif Ali
 * Date: 18/04/2019
 * Time: 13:07
 */
include_once '../Model/FilmDAO.php';
include '../View/layout/header.php';


//calls - sql queries
$basket = array();
$chosen = '';
if (!isset($chosen)) {
    $chosen = "";
} elseif ($_SERVER['REQUEST_METHOD'] == "POST") {
    $chosen = ($_POST['film']);
}

//$_SESSION['basket'];
//array_push($_SESSION['basket'],$chosen);
$dao = new FilmDAO();
$desc = $dao->getAllFilmDesc($chosen);
$filmDropDown = $dao->getAllFilmTitle();
$price = $dao->getPrice($chosen);
$rating = $dao->getRating($chosen);




