<!DOCTYPE html>
<html lang="en" xmlns:action="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
</head>
<body>
<?php
include 'layout/header.php';
?>
<h1> Register here </h1>
<form action= "../Controller/register_handler.php" method="POST">

    Name:<br>
    <input type="text" name = "firstname" minlength="2" maxlength="35" required ><br>


    Phone:<br>
    <input type="text" name = "phone" minlength="2" maxlength="35" required ><br>

    Email:<br>
    <input type="email" name = "email_register" size="20" minlength="5" maxlength="60" required><br>

    Address:<br>
    <input type="text" name = "address" minlength="5" maxlength="50" required><br>

    City:<br>
    <input type="text" name = "city" minlength="3" maxlength="50" required><br>

    Postcode:<br>
    <input type="text" name = "postcode" minlength="4" maxlength="8" required><br>


    <input type="submit" value="Submit">
</form>

</body>
</html>