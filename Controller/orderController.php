<?php
/**
 * Created by PhpStorm.
 * User: Altif Ali
 * Date: 21/04/2019
 * Time: 20:28
 */
require_once '../Model/CustomerDAO.php';
$orderDao = new CustomerDAO();

$displayOrders = $orderDao->previousOrders();