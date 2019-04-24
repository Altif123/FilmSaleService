<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>Register</title>

</head>
<body>

<?php //script to handle the register page
include_once '../Model/CustomerDAO.php';
//include '../Controller/customerController.php';
$dao = new CustomerDAO();


$fName = $phone = $address =$password1 = $password2 = $email = $city = $postcode = "";
$nameErr = $phoneErr = $passwordErr =$emailErr = $addressErr = $cityErr = $postcodeErr = "";

//strips data of malicious code
function check_data($value)
{
    $value = trim($value);
    $value = stripslashes($value);
    $value = htmlspecialchars($value);
    return $value;
}
//detailsValidation(($_POST['firstname']),($_POST['phone']),($_POST["password1"]),($_POST["password2"]),($_POST['email_register']),($_POST['address']),($_POST['city']),($_POST['postcode']));
/*
$namev =$_POST['firstname'] ;
$phonev= $_POST['phone'];
$password1v= $_POST["password1"];
$password2v=$_POST["password2"];
$emailv=$_POST['email_register'];
$addressv=$_POST['address'] ;
$cityv=$_POST['city'];
$postcodev=$_POST['postcode'] ;

//detailsValidation($namev,$phonev,$password1v,$password2v,$emailv,$addressv,$cityv,$pistcosev);
*/

//validate first name
if (empty($_POST['firstname'])) {
    $fName = "";
    $nameErr = '<p class="error"> you must enter a first name</p>';
} else if (!preg_match("/^[a-zA-Z_ ]*$/", $_POST['firstname'])) {
    $nameErr = '<p class="error"> name can only contain letters  </p>';
} else {
    $fName = check_data($_POST['firstname']);
}

//validate phone
if (empty($_POST['phone'])){
    $phone=NULL;
    $phoneErr = '<p class="error"> please enter phone </p>';
}elseif (!preg_match("/^[0-9]*$/", $_POST['phone'])){
    $phoneErr = '<p class="error"> your phone number cam only contain numbers </p>';
}else{
    $phone = check_data($_POST['phone']);
}

//password validation
if(!empty($_POST["password1"])) {
    if (!empty($_POST["password2"])){
        if(strlen($_POST["password1"]) < '8'){
            $passwordErr = '<p class="error"> your password must contain 7 characters</p>';
        } elseif (!preg_match("#[0-9]+#",$_POST["password1"])){
            $passwordErr = '<p class="error"> Your Password Must Contain At Least 1 number</p>';
        } elseif (($_POST["password1"] !== $_POST["password2"])) {
            $passwordErr = '<p class="error">passwords must match</p>';
        }elseif (($_POST["password1"] == $_POST["password2"])){
            $password1 = check_data($_POST["password1"]);
            $password2 = check_data($_POST["password2"]);
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
if ($fName && $phone && $address && $password1&&$password2 && $email && $city && $postcode!= NULL) {
    $register = $dao->registerDetails($fName,$phone,$email,$address,$city,$postcode,$password1);//register function from
    $register;

} else {
    echo '<p class="error"> please go back and re-enter details please</p>';
}

echo $nameErr;
echo $phoneErr;
echo $passwordErr;
echo $password1;
echo $password2;
echo $emailErr;
echo $addressErr;
echo $cityErr;
echo $postcodeErr;

//check if email not in use




?><br>


</body>