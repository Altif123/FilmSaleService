<!DOCTYPE html>
<html lang="en" xmlns:action="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <title>Account</title>
</head>
<body>
<?php
include 'layout/header.php';
?>
<h1> Register here </h1>
<form action= "../Controller/register_handler.php" method="POST">

    Name:<br>
    <input type="text" name = "firstname" minlength="2" maxlength="35" ><br>




    <input type="submit" value="Submit">
</form>

<?php

?>

</body>
</html>
