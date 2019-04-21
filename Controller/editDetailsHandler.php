<?php
/**
 * Created by PhpStorm.
 * User: Altif Ali
 * Date: 17/04/2019
 * Time: 21:29
 */
$fName = $phone = $address =$password1 =$password2 = $email = $city = $postcode = "";
$nameErr = $phoneErr = $passwordErr =$emailErr = $addressErr = $cityErr = $postcodeErr = "";

//strips data of malicious code
function check_data($value)
{
    $value = trim($value);
    $value = stripslashes($value);
    $value = htmlspecialchars($value);
    return $value;
}


if (empty($_POST['firstnameUpdate'])) {
    $fName = "";
    $nameErr = '<p class="error"> you must enter a first name</p>';
} else if (!preg_match("/^[a-zA-Z_ ]*$/", $_POST['firstnameUpdate'])) {
    $nameErr = '<p class="error"> name can only contain letters  </p>';
} else {
    $fName = check_data($_POST['firstnameUpdate']);
}

//validate phone
if (empty($_POST['phoneUpdate'])){
    $phone=NULL;
    $phoneErr = '<p class="error"> please enter phone </p>';
}elseif (!preg_match("/^[0-9]*$/", $_POST['phoneUpdate'])){
    $phoneErr = '<p class="error"> your phone number cam only contain numbers </p>';
}else{
    $phone = check_data($_POST['phoneUpdate']);
}

//password validation
if(!empty($_POST["password1Update"])) {
    if (!empty($_POST["password2Update"])){
        if(strlen($_POST["password1Update"]) < '8'){
            $passwordErr = '<p class="error"> your password must contain 7 characters</p>';
        } elseif (!preg_match("#[0-9]+#",$_POST["password1Update"])){
            $passwordErr = '<p class="error"> Your Password Must Contain At Least 1 number</p>';
        } elseif (($_POST["password1Update"] !== $_POST["password2Update"])) {
            $passwordErr = '<p class="error">passwords must match</p>';
        }elseif (($_POST["password1Update"] == $_POST["password2Update"])){
            $password1 = check_data($_POST["password1Update"]);
            $password2 = check_data($_POST["password2Update"]);
        }
    }else{
        $password2 = "";
        $passwordErr = '<p class="error"> please enter confirm password </p>';
    }

}else{
    $password1 = "";
    $passwordErr = '<p class="error"> please enter password </p>';
}

//validate email
if (!empty($_POST['email_registerUpdate'])) {
    $email = check_data($_POST['email_registerUpdate']);
} else {
    $email = NULL;
    $emailErr = '<p class="error"> Please enter email address</p>';
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $emailErr = '<p class="error"> Please double check your email</p>';
}
//validate address
if (!empty($_POST['addressUpdate'])) {
    $address = check_data($_POST['addressUpdate']);
} else {
    $address = NULL;
    $addressErr = '<p class="error"> Please enter address</p>';
}

if (!empty($_POST['cityUpdate'])) {
    $city = check_data($_POST['cityUpdate']);
} else {
    $city = NULL;
    $cityErr = '<p class="error"> Please enter address</p>';
}
//validate postcode
if (!empty($_POST['postcodeUpdate'])) {
    $postcode = check_data($_POST['postcodeUpdate']);
} else {
    $postcode = "";
    $postcodeErr = '<p class="error"> Please enter post code</p>';
}
if ($fName && $phone && $address && $password1 && $password2 && $email && $city && $postcode!= NULL){//validayion succesfull
    echo '<p>Thank you your details have validated</p>';
}else{
    echo '<p>Go back and re-enter details please</p>';
}

//update query

echo $passwordErr;
echo $phoneErr;
echo $emailErr;
echo $addressErr;
echo $cityErr;
echo $postcodeErr;