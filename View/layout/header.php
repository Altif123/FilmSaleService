<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Navigation bar</title>
    <style>

        /*Add a black background color to the top navigation*/
        .navbar {
            background-color: darkgrey;
            overflow: hidden;
        }

        /*styling for the links */
        .navbar a {
            float: left;
            color: #f2f2f2;
            text-align: center;
            font-family: Calibri, serif;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
        }

         /*hover chnages the colour*/
        .navbar a:hover {
            background-color: white;
            color: black;
        }



    </style>
</head>
<body>
<?php session_start(); ?>
<?php  if (isset($_SESSION['loggedIn'])==true):
     ?>
<div class = "navbar">
    <a href="/webintegration/View/index.php">Home</a>
    <a href="/webintegration/View/register.php">Register</a>
    <a href="/webintegration/View/browse.php">Browse</a>
    <a href="/webintegration/View/editDetailsView.php" >Edit details</a>
    <a href="/webintegration/View/accountView.php" >Account</a>
    <a href="/webintegration/Controller/logoutController.php">Log out</a>
    <div class="userid">

    <p style="text-align: right; color: black;padding-right: 10px;font-family: Calibri, serif; font-weight: bold";><?php echo 'logged in: ' . $_SESSION['username']; ?></p>

    </div>

</div>
<?php else:      ?>
<div class="navbar">
    <a href="/webintegration/View/index.php">Home</a>
    <a href="/webintegration/View/register.php">Register</a>
    <a href="/webintegration/View/browse.php">Browse</a>
    <a href="/webintegration/View/login.php">Login</a>

</div>

<?php endif   ?>




</body>
</html>