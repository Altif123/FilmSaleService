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
    <input type="text" name = "firstnameUpdate" minlength="2" maxlength="35" ><br>


    Phone:<br>
    <input type="text" name = "phoneUpdate" minlength="2" maxlength="35"  ><br>

    Email:<br>
    <input type="email" name = "email_registerUpdate" size="20" minlength="5" maxlength="60" ><br>

    Password:<br>
    <input type="password" name = "password1Update" size="20" minlength="5" maxlength="60" ><br>

    Confirm Password:<br>
    <input type="password" name = "password2Update" size="20" minlength="5" maxlength="60" ><br>

    Address:<br>
    <input type="text" name = "addressUpdate" minlength="5" maxlength="50" ><br>

    City:<br>
    <input type="text" name = "cityUpdate" minlength="3" maxlength="50" ><br>

    Postcode:<br>
    <input type="text" name = "postcodeUpdate" minlength="4" maxlength="8" ><br>


    <input type="submit" value="Save Changes">
</form>

<?php

?>

</body>
</html>