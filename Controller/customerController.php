<?php
/**
 * Created by PhpStorm.
 * User: Altif Ali
 * Date: 19/04/2019
 * Time: 12:05
 */
include_once '../Model/CustomerDAO.php';
$dao = new CustomerDAO();
$register = $dao->registerDetails();