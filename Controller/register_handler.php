<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>login</title>

</head>
<body>

<?php //script to handle the register page
require('../Model/dbconnect.php');



//validation
/*check if form items empty
 * if the form item not empty
 * then
 * create variable
 * else error message
 */

//validate first name
if(!empty($_POST['firstname'])){
    $firstname = check_data($_POST['firstname']);
}else{
    $firstname = NULL;
    echo '<p class="error"> you must enter a first name</p>';
}
//validate lastname
if(!empty($_POST['phone'])){
    $phone = check_data( $_POST['phone']);
}else{
    $phone = NULL;
    echo '<p class="error"> please enter phone </p>';
}
//validate email
if(!empty($_POST['email_register'])){
    $email = check_data($_POST['email_register']);
}else{
    $email = NULL;
    echo '<p class="error"> Please enter email address</p>';
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo '<p class="error"> Please double check your email</p>';
}
//validate address
if(!empty($_POST['address'])){
    $address = check_data($_POST['address']);
}else{
    $address = NULL;
    echo '<p class="error"> Please enter address</p>';
}
//validate postcode
if(!empty($_POST['postcode'])){
    $postcode = check_data($_POST['postcode']);
}else{
    $postcode = NULL;
    echo '<p class="error"> Please enter post code</p>';
}

if($firstname&&$phone&&$email&&$address&&$postcode){
    echo '<p>Thank your details have been validated </p>';
}else{
    echo '<p class="error"> please go back and re-enter details please</p>';
}
//strips data of malicious code 
function check_data($value) {
    $value = trim($value);
    $value = stripslashes($value);
    $value = htmlspecialchars($value);
    return $value;
}

//check if email not in use
$q = "SELECT personid FROM fss_Person WHERE personemail = '$email' AND personid !=personid";
$r = @mysqli_query($conn, $q);
//insert fields in to DB
$insertPersonName = "INSERT INTO fss_Person (personname,personphone,personemail)VALUES ('$_POST[firstname]','$_POST[phone]','$_POST[email_register]')";
if(mysqli_query($conn, $insertPersonName)){
    echo "records added";
}else{
    echo "error, unable to execute $insertPersonName.".mysqli_error($conn);
}
$insertAddress = "INSERT INTO fss_address (addstreet,addcity,addpostcode)VALUES ('$_POST[address]','$_POST[city]','$_POST[postcode]')";
if(mysqli_query($conn, $insertAddress)){
    echo "address records added";
}else{
    echo "error, unable to execute $insertAddress.".mysqli_error($conn);
}

?><br>


</body>