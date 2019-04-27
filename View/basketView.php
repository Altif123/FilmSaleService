<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="CSS/basketStyle.css">
</head>
<body>

<?php

include 'layout/header.php';//adds the header to the page
include '../Controller/basketController.php';
?>

<h1> Basket page </h1>
<h3>Items in your basket:</h3>

<?php
displayBasket();
removeItem();



?>
<form action="../Controller/basketController.php">
    <button type="submit" name="confim" value="confirm"> confirm</button>
</form>

</body>
</html>