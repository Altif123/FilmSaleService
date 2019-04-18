<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>login</title>

</head>
<body>

<?php //script to handle the register page
require('../Model/dbconnect.php');

$fName = $phone = $address = $email = $city = $postcode = "";
$nameErr = $phoneErr = $emailErr = $addressErr = $cityErr = $postcodeErr = "";

//strips data of malicious code
function check_data($value)
{
    $value = trim($value);
    $value = stripslashes($value);
    $value = htmlspecialchars($value);
    return $value;
}


//validate first name
if (empty($_POST['firstname'])) {
    $fName = "";
    $nameErr = '<p class="error"> you must enter a first name</p>';
} else if (!preg_match("/^[a-zA-Z]*$/", $_POST['firstname'])) {
    $nameErr = '<p class="error"> name can only contain letters  </p>';
} else {
    $fName = check_data($_POST['firstname']);
}


//validate lastname
if (!empty($_POST['phone'])) {
    $phone = check_data($_POST['phone']);
} else {
    $phone = NULL;
    $phoneErr = '<p class="error"> please enter phone </p>';
}
//validate email
if (!empty($_POST['email_register'])) {
    $email = check_data($_POST['email_register']);
} else {
    $email = NULL;
    $emailErr = '<p class="error"> Please enter email address</p>';
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $emailErr = '<p class="error"> Please double check your email</p>';
}
//validate address
if (!empty($_POST['address'])) {
    $address = check_data($_POST['address']);
} else {
    $address = NULL;
    $addressErr = '<p class="error"> Please enter address</p>';
}

if (!empty($_POST['city'])) {
    $city = check_data($_POST['city']);
} else {
    $city = NULL;
    $cityErr = '<p class="error"> Please enter address</p>';
}
//validate postcode
if (!empty($_POST['postcode'])) {
    $postcode = check_data($_POST['postcode']);
} else {
    $postcode = "";
    $postcodeErr = '<p class="error"> Please enter post code</p>';
}

//////////////////////////////////////////////////////////////////////////////////////////
//insert fields in to DB
if ($fName && $phone && $address && $email && $city && $postcode) {
    $insertPersonName = "INSERT INTO fss_Person (personname,personphone,personemail)VALUES ('$fName','$phone','$email')";
    if (mysqli_query($conn, $insertPersonName)) {
        echo "records added";
    } else {
        echo "error, unable to execute $insertPersonName." . mysqli_error($conn);
    }
    $insertAddress = "INSERT INTO fss_address (addstreet,addcity,addpostcode)VALUES ('$address','$city','$postcode')";
    if (mysqli_query($conn, $insertAddress)) {
        echo "address records added";
    } else {
        echo "error, unable to execute $insertAddress." . mysqli_error($conn);
    }
    echo '<p>Thank your details have been validated </p>';

} else {
    echo '<p class="error"> please go back and re-enter details please</p>';
}


//check if email not in use

//$q = "SELECT personid FROM fss_Person WHERE personemail = '$email' AND personid !=personid";
//$r = @mysqli_query($conn, $q);


?><br>


</body>