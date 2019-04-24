<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>Browse</title>
<link rel="stylesheet" type="text/css" href="CSS/browseStyle.css">
</head>

<body>

<?php
include 'layout/header.php';
include_once "../Controller/filmController.php";

?>

<div class="drop_down" style="text-align: center">
    <h1>Browse all films</h1>

    <form method="POST">
<?php
//display fucntion
$chosen = "";//set variable to empty
echo $filmDropDown;
?>
        <input type="submit" name="submit" value= "Select film" />
        <button type="button" name="AddBasket">Add to your basket</button>
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"]== "POST") {//
        $chosen = ($_POST['film']);//select option assigned variable
        }?>
</div>
<ul>

    <li class="filmName"> <?php  echo 'Film Selected: ' .$chosen ?></li>
    <div class=" filmDescDiv ">
        <li class="filmDesc"> <div class="filmDescDiv2"><p style="text-decoration: underline"> Film description
                </p><?php echo $desc?></li>
    </div>
    <div class=" filmPriceDiv ">
        <li class="filmPrice"> <?php echo 'Film Price: £' .$price?></li>
     </div>
    <div class=" filmRatingDiv ">
        <li class="filmRating"> <?php echo 'Film rating: ' .$rating?></li>
    </div>

</ul>

</body>
</html>