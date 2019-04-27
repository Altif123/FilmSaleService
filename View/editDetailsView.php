<!DOCTYPE html>
<html lang="en" xmlns:action="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="CSS/formStyle.css">
    <style>
        p {
            font-family: Calibri, serif;
            color: orangered;
        }
    </style>
</head>
<body>
<?php
include 'layout/header.php';
include '../Controller/editDetailsController.php';
include '../Controller/editDetailsHandler.php';
?>
<h1> Edit details here </h1>
<form action="../View/editDetailsView.php" method="POST">
    <div class="label">


        <label>Name:<br></label>
        <input type="text" name="firstnameUpdate" minlength="2" maxlength="35"
               placeholder=" <?php echo $getName1 ?> "><br><?php echo $nameErr ?>


        <label>Phone:<br></label>
        <input type="text" name="phoneUpdate" minlength="2" maxlength="35" placeholder="<?php echo $getPhone1 ?> ">
        <?php echo $phoneErr ?><br>

        <label>Email:<br></label>
        <input type="email" name="email_registerUpdate" size="20" minlength="5" maxlength="60"
               placeholder="<?php echo $getEmail1 ?> "> <?php echo $emailErr ?><br>

        <label>Password:<br></label>
        <input type="password" name="password1Update" size="20" minlength="5" maxlength="60"> <?php echo $passwordErr ?>
        <br>

        <label>Confirm New Password:<br></label>
        <input type="password" name="password2Update" size="20" minlength="5" maxlength="60"><br>

        <label>Address:<br></label>
        <input type="text" name="addressUpdate" minlength="5" maxlength="50"
               placeholder="<?php echo $getStreet1 ?>"><?php echo $addressErr ?><br>

        <label>City:<br></label>
        <input type="text" name="cityUpdate" minlength="3" maxlength="50" placeholder="<?php echo $getCity1 ?>">
        <?php echo $cityErr ?><br>

        <label>Postcode:<br></label>
        <input type="text" name="postcodeUpdate" minlength="4" maxlength="8"
               placeholder="<?php echo $getPostcode1 ?>"><?php echo $postcodeErr ?><br>

    </div>
    <input type="submit" name="saveBtn" value="Save Changes">
</form>

<?php

?>

</body>
</html>