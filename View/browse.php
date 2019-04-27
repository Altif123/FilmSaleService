<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>Browse</title>
    <link rel="stylesheet" type="text/css" href="CSS/browseStyle.css">
</head>

<body>

<?php
//include 'layout/header.php';
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
        <input type="submit" name="selectFilm" value="Select film"/>
        <button type="submit" name="addBasket">Add to your basket</button>
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {//
        if (isset($_POST['selectFilm'])) {
            ?>
            <ul>

                <li class="filmName"> <?php echo 'Film Selected: ' . $_POST['film'] ?></li>
                <div class=" filmDescDiv ">
                    <li class="filmDesc">
                        <div class="filmDescDiv2"><p style="text-decoration: underline"> Film description
                            </p><?php echo $desc ?></li>
                </div>
                <div class=" filmPriceDiv ">
                    <li class="filmPrice"> <?php echo 'Film Price: £' . $price ?></li>
                </div>
                <div class=" filmRatingDiv ">
                    <li class="filmRating"> <?php echo 'Film rating: ' . $rating ?></li>
                </div>

            </ul>
            <?php
        } elseif (isset($_POST['addBasket'])) {
            $chosen = ($_POST['film']);//select option assigned variable
            array_push($_SESSION['basket'], $_POST['film']);
            //var_dump($_SESSION['basket']);
            echo '<p>' . $_POST['film'] . ' added to basket<p>';

        }
    } ?>
</div>
</body>
</html>