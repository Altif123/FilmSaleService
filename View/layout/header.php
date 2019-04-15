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

        /*style properties for the link */
        .navbar a {
            float: left;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
        }

         /*hover chnages the colour*/
        .navbar a:hover {
            background-color: white;
            color: black;
        }

        /* Add a color to the active/current link */
        .navbar a.active {
            background-color: cadetblue;
            color: white;
        }

    </style>
</head>
<body>

<div class = "navbar">
    <a href="/webintegration/View/index.php">Home</a>
    <a href="/webintegration/View/register.php">Register</a>
    <a href="/webintegration/View/login.php">Login</a>
</div>





</body>
</html>