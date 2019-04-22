<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order History</title>
    <link rel="stylesheet" type="text/css" href="CSS/orderViewStyle.css">
</head>
<body>
<?php
session_start();
include 'layout/header.php';
require_once '../Controller/orderController.php';
?>

<h1 style="font-family:verdana;font-size:200%;">Orders For  <?php echo $_SESSION['user_id']  ?></h1>

<h4>Order Table: <?php  $displayOrders ?> </h4>
</body>
</html>