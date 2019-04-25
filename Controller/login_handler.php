<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>login </title>
<?php include_once '../View/layout/header.php'  ?>

</head>
<body>


<?php
require_once '../Model/CustomerDAO.php';
$loginDao = new CustomerDAO();
if($_SERVER["REQUEST_METHOD"] == "POST") {


    echo $_POST["email_login"];//used for testing

    $loggedIn = false;//set to false before the user logs in
    /*check if form items empty
     * if the form item not empty
     * then
     * create variable
     * else error message
     */
    $emailErr = $passwordErr = "";
//validate email
    if (!empty($_POST['email_login'])) {
        $email = $_POST['email_login'];
    } else {
        $email = NULL;
        $emailErr = '<p class="error"> Please enter email address</p>';
        echo $emailErr;
    }
    $_SESSION['user_id'] = $email;
//validate password if password missing
    if (!empty($_POST['password'])) {
        if (strlen($_POST["password"]) < '8') {
            $passwordErr = '<p class="error"> your password must contain 7 characters</p>';
        } elseif (!preg_match("#[0-9]+#", $_POST["password"])) {
            $passwordErr = '<p class="error"> Your Password Must Contain At Least 1 number</p>';
        }
    } else {
        $password1 = "";
        $passwordErr = '<p class="error"> please enter password </p>';
    }


    $password = $_POST['password'];


    $conn = new mysqli('localhost', 'root', '', 'filmsaleservice');
    $login = "SELECT personemail,custpassword FROM fss_person
INNER JOIN fss_customer ON fss_person.personid =fss_customer.custid
WHERE fss_person.personemail = '$email' AND fss_customer.custpassword = '$password'";
    if ($_POST['password'] && $email != "" && $passwordErr == NULL && $emailErr == NULL) {
        $loginCheck = mysqli_query($conn, $login);
        if (mysqli_num_rows($loginCheck) == 1) {
            $loggedIn = true;
            $_SESSION['loggedIn'] = $loggedIn;
            echo '<p style="font-family: Calibri, serif; font-size: 25px">login successful, you can now browse or view your account</p>';
        } else {
            echo '<p>login and password dont match</p>';

        }
    } else {
        echo '<p>email or password contain errors</p>';
    }

    $userName = "SELECT personname FROM fss_person WHERE fss_person.personemail = '$email'";
    $userNameDisplay = mysqli_query($conn, $userName);
    $loggedInUser = $userNameDisplay->fetch_assoc();
    $name = $loggedInUser['personname'];
    $_SESSION['username'] = $name;

}


//validation query password must be indata base if not please register
?>



</body>
</html>