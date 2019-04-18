<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>Browse</title>
<link rel="stylesheet" type="text/css" href="CSS/browseStyle.css">
</head>

<body>

<?php
include 'layout/header.php';
require('../Model/dbconnect.php');
include_once "../Controller/filmController.php";

?>

<div class="drop_down" style="text-align: center">
    <h1>Browse all films</h1>

    <form method="POST">
<?php
//display fucntion
$chosen = "";//set variable to empty
echo $filmDropDown;



//mysqli_close($conn);//close the connection when finished
?>
        <input type="submit" name="submit" value= "Select film" />
        <button type="button" name="AddBasket">Add to your basket</button>
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"]== "POST") {//
        $chosen = ($_POST['film']);//select option assigned variable

    }//sql queries




    $getPrice = "SELECT price FROM fss_filmpurchase 
        JOIN fss_film ON fss_filmpurchase.filmid = fss_film.filmid
        WHERE fss_film.filmtitle = \"$chosen\" ORDER BY fss_filmpurchase.payid DESC LIMIT 1";//all film query
    $displayPrice = mysqli_query($conn, $getPrice);
    $priceRow = $displayPrice->fetch_assoc();

    $getRating = "SELECT filmrating FROM fss_rating 
        JOIN fss_film ON fss_film.ratid = fss_rating.ratid
        WHERE fss_film.filmtitle = \"$chosen\"";
    $displayRating =mysqli_query($conn,$getRating);
    $ratingRow =$displayRating->fetch_assoc();



        ?>
</div>
<ul>

    <li class="filmName"> <?php  echo 'Film Selected: ' .$chosen ?></li>
    <div class=" filmDescDiv ">
        <li class="filmDesc"> <div class="filmDescDiv2"><p style="text-decoration: underline"> Film description
                </p><?php echo $desc?></li>
    </div>
    <div class=" filmPriceDiv ">
        <li class="filmPrice"> <?php echo 'Film Price: £' .$priceRow['price']?></li>
     </div>
    <div class=" filmRatingDiv ">
        <li class="filmRating"> <?php echo 'Film rating: ' .$ratingRow['filmrating']?></li>
    </div>

</ul>

</body>
</html>