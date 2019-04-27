<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>Register</title>

</head>
<body>

<?php //script to handle the register page
include_once '../Model/CustomerDAO.php';
$dao = new CustomerDAO();


$fName = $phone = $address = $password1 = $password2 = $email = $city = $postcode = "";
$nameErr = $phoneErr = $passwordErr = $emailErr = $addressErr = $cityErr = $postcodeErr = "";

//strips data of malicious code
function check_data($value)
{
    $value = trim($value);
    $value = stripslashes($value);
    $value = htmlspecialchars($value);
    return $value;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
    if (empty($_POST['phone'])) {
        $phone = NULL;
        $phoneErr = '<p class="error"> please enter phone </p>';
    } elseif (!preg_match("/^[0-9]*$/", $_POST['phone'])) {
        $phoneErr = '<p class="error"> your phone number cam only contain numbers </p>';
    } else {
        $phone = check_data($_POST['phone']);
    }

//password validation
    if (!empty($_POST["password1"])) {
        if (!empty($_POST["password2"])) {
            if (strlen($_POST["password1"]) < '8') {
                $passwordErr = '<p class="error"> your password must contain 7 characters</p>';
            } elseif (!preg_match("#[0-9]+#", $_POST["password1"])) {
                $passwordErr = '<p class="error"> Your Password Must Contain At Least 1 number</p>';
            } elseif (($_POST["password1"] !== $_POST["password2"])) {
                $passwordErr = '<p class="error">passwords must match</p>';
            } elseif (($_POST["password1"] == $_POST["password2"])) {
                $password1 = check_data($_POST["password1"]);
                //code to hash password1
                //$password_encrypted = password_hash($password1, PASSWORD_BCRYPT);
                $password2 = check_data($_POST["password2"]);
            }
        } else {
            $password2 = "";
            $passwordErr = '<p class="error"> please enter confirm password </p>';
        }

    } else {
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
        $email = NULL;
        $emailErr = '<p class="error"> Please double check your email</p>';
    }
    if ($dao->checkEmailNotRegistered($_POST['email_register'])) {
        $email = NULL;
        $emailErr = '<p class="error"> email already registered</p>';

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
    if ($fName && $phone && $address && $password1 && $password2 && $email && $city && $postcode != NULL) {
        $register = $dao->registerDetails($fName, $phone, $email, $address, $city, $postcode, $password1);//register function from
        $register;

    } else {
        echo '<p class="error" style="font-family: Calibri, serif; font-size:20px; color: orangered "> 
                Please go back and re-enter details please</p>';
    }


}
//check if email not in use


?><br>


</body>