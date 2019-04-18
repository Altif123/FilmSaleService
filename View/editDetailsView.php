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
<h1> Edit details here </h1>
<form action= "../Controller/editDetailsHandler.php" method="POST">

    Name:<br>
    <input type="text" name = "firstname" minlength="2" maxlength="35" ><br>


    Phone:<br>
    <input type="text" name = "phone" minlength="2" maxlength="35"  ><br>

    Email:<br>
    <input type="email" name = "email_register" size="20" minlength="5" maxlength="60" ><br>

    Password:<br>
    <input type="password" name = "password1" size="20" minlength="5" maxlength="60" ><br>

    Confirm Password:<br>
    <input type="password" name = "password2" size="20" minlength="5" maxlength="60" ><br>

    Address:<br>
    <input type="text" name = "address" minlength="5" maxlength="50" ><br>

    City:<br>
    <input type="text" name = "city" minlength="3" maxlength="50" ><br>

    Postcode:<br>
    <input type="text" name = "postcode" minlength="4" maxlength="8" ><br>


    <input type="submit" value="Submit">
</form>

<?php

?>

</body>
</html>