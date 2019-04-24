<?php
/**
 * Created by PhpStorm.
 * User: Altif Ali
 * Date: 23/04/2019
 * Time: 22:29
 */
require_once '../Model/CustomerDAO.php';
$old = new CustomerDAO();

$getName1 = $old->getName();
$getEmail1 = $old->getEmail();
$getPhone1 = $old->getPhone();
$getStreet1 =$old->getStreet();
$getPostcode1 =$old->getPostcode();
$getCity1 = $old->getCity();
$getPass1 = $old->getPassword();

//update

