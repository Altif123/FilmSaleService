<?php
/**
 * Created by PhpStorm.
 * User: Altif Ali
 * Date: 19/04/2019
 * Time: 12:05
 */
include_once '../Model/CustomerDAO.php';
//$dao = new CustomerDAO();
//$register = $dao->registerDetails();


function detailsValidation($namev,$phonev,$password1v,$password2v,$emailv,$addressv,$cityv,$postcodev)
{
    $fName = $phone = $address = $password1 = $password2 = $email = $city = $postcode = "";
    $nameErr = $phoneErr = $passwordErr = $emailErr = $addressErr = $cityErr = $postcodeErr = "";

    if (empty($namev)) {
        $fName = "";
        $nameErr = '<p class="error"> you must enter a first name</p>';
    } else if (!preg_match("/^[a-zA-Z_ ]*$/", $namev)) {
        $nameErr = '<p class="error"> name can only contain letters  </p>';
    } else {
        $fName = check_data($namev);
    }

//validate phone
    if (empty($phonev)) {
        $phone = NULL;
        $phoneErr = '<p class="error"> please enter phone </p>';
    } elseif (!preg_match("/^[0-9]*$/", $phonev)) {
        $phoneErr = '<p class="error"> your phone number cam only contain numbers </p>';
    } else {
        $phone = check_data($phonev);
    }

//password validation
    if (!empty($password1v)) {
        if (!empty($password2v)) {
            if (strlen($password1v) < '8') {
                $passwordErr = '<p class="error"> your password must contain 7 characters</p>';
            } elseif (!preg_match("#[0-9]+#", $password1v)) {
                $passwordErr = '<p class="error"> Your Password Must Contain At Least 1 number</p>';
            } elseif (($password1v !== $password2v)) {
                $passwordErr = '<p class="error">passwords must match</p>';
            } elseif (($password1v == $password2v)) {
                $password1 = check_data($password1v);
                $password2 = check_data($password2v);
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
    if (!empty($emailv)) {
        $email = check_data($emailv);
    } else {
        $email = NULL;
        $emailErr = '<p class="error"> Please enter email address</p>';
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = '<p class="error"> Please double check your email</p>';
    }
//validate address
    if (!empty($addressv)) {
        $address = check_data($addressv);
    } else {
        $address = NULL;
        $addressErr = '<p class="error"> Please enter address</p>';
    }

    if (!empty($cityv)) {
        $city = check_data($cityv);
    } else {
        $city = NULL;
        $cityErr = '<p class="error"> Please enter address</p>';
    }
//validate postcode
    if (!empty($postcodev)) {
        $postcode = check_data($postcodev);
    } else {
        $postcode = "";
        $postcodeErr = '<p class="error"> Please enter post code</p>';
    }
}
