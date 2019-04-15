<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>Browse</title>

</head>

<body>

<?php
include 'layout/header.php';
require('../Model/dbconnect.php');
session_start();
?>

<div class="drop_down" style="text-align: center">
    <h1>Browse all films</h1>


    <form method="POST" action="film_details.php">

        <?php

$get_all_films = "SELECT filmtitle AS Films FROM fss_film ORDER BY filmtitle ASC";//all film query
$display_all_films = @mysqli_query($conn, $get_all_films);
    //retrieve data
$film_option = "<select name='film'>";
    while($row = mysqli_fetch_assoc($display_all_films)){//assigns a row to a film
        $film_option .= "<option value='{$row['Films']}'> {$row['Films']}</option>";

    }
echo $film_option;
$film_option .= "</select>";


mysqli_close($conn);//close the connection when finished
?>
        <input type="submit" name="submit" value= "Select film" />
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"]== "POST"){
        $chosen = ($_POST['film']);//select option assigned variable
        echo $chosen;

    }else{
        echo 'broken';
    }

    ?>

</div>
<?php
$test='test';

$_SESSION['film_chosen'] = $chosen;
$_SESSION['seshtest'] = $test;
?>


</body>
</html>