<?php
/**
 * Created by PhpStorm.
 * User: Altif Ali
 * Date: 18/04/2019
 * Time: 13:07
 */
include_once '../Model/FilmDAO.php';

    $chosen=$_POST['film'];
//calls - sql queries
    $dao = new FilmDAO();
    $desc = $dao->getAllFilmDesc($chosen);
    $filmDropDown=$dao->getAllFilmTitle();
    $price = $dao->getPrice($chosen);
    $rating = $dao->getRating($chosen);




//require '../View/test.php';