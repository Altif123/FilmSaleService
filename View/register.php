<!DOCTYPE html>
<html lang="en" xmlns:action="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="CSS/formStyle.css">
</head>
<body>
<?php


include 'layout/header.php';
include '../Controller/register_handler.php'
?>
<h1> Register here </h1>
<form action= "../View/register.php" method="POST">

<p class="p"> Please fill out the form below  </p>
    <div class="label">
    <label>Name:<br></label>

    <input type="text" name = "firstname" minlength="2" maxlength="35" ><?php  echo $nameErr  ?><br>


    <label>Phone:<br></label>
    <input type="text" name = "phone" minlength="2" maxlength="35"  > <?php  echo $phoneErr  ?> <br>

    <label>Password:<br></label>
    <input type="text" name = "password1" minlength="2" maxlength="35"  ><?php  echo $passwordErr  ?><br>

    <label>Confirm password:<br></label>
    <input type="text" name = "password2" minlength="2" maxlength="35"  ><br>

    <label>Email:<br></label>
    <input type="email" name = "email_register" size="20" minlength="5" maxlength="60" ><?php  echo $emailErr  ?><br>

    <label>Address:<br></label>
    <input type="text" name = "address" minlength="5" maxlength="50" > <?php  echo $addressErr  ?><br>

    <label>City:<br></label>
    <input type="text" name = "city" minlength="3" maxlength="50" > <?php  echo $cityErr  ?><br>

    <label>Postcode:<br></label>
    <input type="text" name = "postcode" minlength="4" maxlength="8" ><?php  echo $postcodeErr  ?><br>

</div>
    <input type="submit" value="Submit">
</form>

<?php

?>

</body>
</html>