<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>login</title>

</head>
<body>

<h1>Welcome</h1>

<?php
echo $_POST["email_login"];//used for testing


/*check if form items empty
 * if the form item not empty
 * then
 * create variable
 * else error message
 */

//validate email
if(!empty($_POST['email_login'])){
    $email = $_POST['email_login'];
}else{
    $email = NULL;
    echo '<p class="error"> Please enter email address</p>';
}
//validate password if password missing
if(!empty($_POST['password'])){
    $password = $_POST['password'];
}else{
    $password = NULL;
    echo '<p class="error"> Please enter password </p>';
}
if (strlen($_POST["password"]) < '5') {
    echo '<p class="error"> your password must contain 5 letters or more </p>';
    }
    elseif(!preg_match("#[0-9]+#",$password)) {
        echo '<p class="error"> Your Password needs to Contain At Least 1 Number </p>';
    }

else{



}





?>



</body>
</html>