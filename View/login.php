<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>

<?php
include 'layout/header.php';//adds the header to the page
include '../Controller/login_handler.php';
?>

<h1> Login page </h1>
<form action="../View/login.php" method="POST">
    Email:<br>
    <input type="email" name = "email_login" size="20" maxlength="50" ><br>
    Password:<br>
    <input type="password" name = "password" ><br>
    <input type="submit" value="Submit">

</form>

</body>
</html>