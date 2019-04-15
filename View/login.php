<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>

<?php
include 'layout/header.php';//adds the header to the page
?>

<h1> Login page </h1>
<form action="../Controller/login_handler.php" method="POST">
    Email:<br>
    <input type="email" name = "email_login" size="20" maxlength="50" required><br>
    Password:<br>
    <input type="password" name = "password" required><br>
    <input type="submit" value="Submit">

</form>

</body>
</html>