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
<h1> Account information </h1>
<form action= "../View/editDetailsView.php" method="POST">
    <input type="submit" value="edit details">
</form>
<form action= "../View/" method="POST">
    <input type="submit" value="view orders">
</form>
<form action= "../View/" method="POST">
    <input type="submit" value="Add/Change payment details">
</form>

<?php

?>

</body>
</html>
