<?php
/**
 * Created by PhpStorm.
 * User: Altif Ali
 * Date: 18/04/2019
 * Time: 13:07
 */
include_once '../Model/FilmDAO.php';
//calls - sql queries
$dao = new FilmDAO();
$desc = $dao->getAllFilmDesc('Bambi');
$filmDropDown=$dao->getAllFilmTitle();
//require '../View/test.php';