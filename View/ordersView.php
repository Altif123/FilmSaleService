<style>
    <?php include 'CSS/orderViewStyle.css'; ?>
</style>
<?php
include 'layout/header.php';
require_once '../Controller/orderController.php';

?>
<div class="table">
    <h1 style="font-family:verdana,serif;font-size:200%;">Orders For: <?php echo $_SESSION['user_id'] ?></h1>

    <h4> Total number of films purchased: <?php echo $getTotalOrders ?>    </h4>

    <h4>Order Table: <?php echo $displayOrders ?> </h4>
</div>
</body>
