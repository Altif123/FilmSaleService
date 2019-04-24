<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>login </title>
<?php include_once '../View/layout/header.php'  ?>

</head>
<body>

<h1>Welcome</h1>

<?php
echo $_POST["email_login"];//used for testing

$loggedIn = false;
/*check if form items empty
 * if the form item not empty
 * then
 * create variable
 * else error message
 */
$emailErr = $passwordErr= "";
//validate email
if(!empty($_POST['email_login'])){
    $email = $_POST['email_login'];
}else{
    $email = NULL;
    $emailErr = '<p class="error"> Please enter email address</p>';
    echo $emailErr;
}
$_SESSION['user_id'] = $email ;
//validate password if password missing
if(!empty($_POST['password'])){
    $password = $_POST['password'];
}else{
    $password = NULL;
    $passwordErr = '<p class="error"> Please enter email address</p>';
    echo '<p class="error"> Please enter password </p>';
}
if (strlen($_POST["password"]) < '7') {
    $password = NULL;
    echo '<p> class="error"> your password must contain 7 letters or more </p>';
    }
    elseif(!preg_match("#[0-9]+#",$password)) {
        $password = NULL;
        $passwordErr = '<p class="error"> Your Password needs to Contain At Least 1 Number </p>';
    }
$conn = new mysqli('localhost', 'root', '', 'filmsaleservice');
$login= "SELECT personemail,custpassword FROM fss_person
INNER JOIN fss_customer ON fss_person.personid =fss_customer.custid
WHERE fss_person.personemail = '$email' AND fss_customer.custpassword = '$password'";

    if(mysqli_query($conn,$login)){
        $loggedIn=true;
        $_SESSION['loggedIn'] = $loggedIn;
        echo 'login sucessful';
    }else{
        echo 'login and password dont match';
    }
$userName = "SELECT personname FROM fss_person WHERE fss_person.personemail = '$email'";
$userNameDisplay = mysqli_query($conn,$userName);
$loggedInUser = $userNameDisplay->fetch_assoc();
$name = $loggedInUser['personname'];
$_SESSION['username'] = $name;



//validation query password must be indata base if not please register
?>



</body>
</html>