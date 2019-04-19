<?php
/**
 * Created by PhpStorm.
 * User: Altif Ali
 * Date: 17/04/2019
 * Time: 21:29
 */
$fName = $phone = $address = $email = $city = $postcode = "";
$nameErr = $phoneErr = $passwordErr =$emailErr = $addressErr = $cityErr = $postcodeErr = "";

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
} else if (preg_match("/^[a-zA-Z]*$/", $_POST['firstname'])) {
    $nameErr = '<p class="error"> name can only contain letters  </p>';
} else {
    $fName = check_data($_POST['firstname']);
}


//validate phone
if (!empty($_POST['phone'])) {

    {
        if (!preg_match("/^[0-9]*$/", $_POST['phone'])) {
            $PhoneErr = '<p class="error"> phone number can only contain numbers  </p>';

        } else {
            $phone = NULL;
            $phoneErr = '<p class="error"> please enter phone </p>';
        }
    }
    $phone = check_data($_POST['phone']);
}


//validate password
if(($_POST["password1"] == $_POST["password2"])) {
    $password1 = check_data($_POST["password1"]);
    $password2 = check_data($_POST["password2"]);
    if (strlen($_POST["password1"]) <= '8') {
        $passwordErr = '<p class="error"> your password must contain 8 characters</p>';
    }
    elseif(!preg_match("#[0-9]+#",$password1)) {
        $passwordErr = "Your Password Must Contain At Least 1 Number!";
    }

    elseif(!preg_match("#[a-zA-Z]+#",$password1)) {
        $passwordErr = '<p class="error"> Your Password Must Contain At Least 1 Lowercase Letter</p>';
    }
    elseif (empty($_POST["password1"])){
        $passwordErr = '<p class="error"> Please enter password</p>';
    }
    else{
        $passwordErr = '<p class="error">passwords must match</p>';
    }
}

//validate email
if (!empty($_POST['email_register'])) {
    $email = check_data($_POST['email_register']);
}elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $emailErr = '<p class="error"> Please double check your email</p>';
} else {
    $email = NULL;
    $emailErr = '<p class="error"> Please enter email address/p>';
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
    $cityErr = '<p class="error"> Please enter city</p>';
}
//validate postcode
if (!empty($_POST['postcode'])) {
    $postcode = check_data($_POST['postcode']);
} else {
    $postcode = "";
    $postcodeErr = '<p class="error"> Please enter post code</p>';
}

//validayion succesfull
//update query

echo $passwordErr;
echo $phoneErr;
echo $emailErr;
echo $addressErr;
echo $cityErr;
echo $postcodeErr;