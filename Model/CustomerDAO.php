<?php
/**
 * Created by PhpStorm.
 * User: Altif Ali
 * Date: 19/04/2019
 * Time: 11:08
 */
require_once "../Model/DAO.php";
class CustomerDAO extends DAO{

public function registerDetails($fName,$phone,$email,$address,$city,$postcode){
    $conn = new mysqli('localhost', 'root', '', 'filmsaleservice');
    $insertPersonName = "INSERT INTO fss_Person (personname,personphone,personemail)VALUES ('$fName','$phone','$email')";
    if (mysqli_query($conn, $insertPersonName)) {
        echo "records added";
    } else {
        echo "error, unable to execute $insertPersonName." . mysqli_error($conn);
    }
    $insertAddress = "INSERT INTO fss_address (addstreet,addcity,addpostcode)VALUES ('$address','$city','$postcode')";
    if (mysqli_query($conn, $insertAddress)) {
        echo "address records added";
    } else {
        echo "error, unable to execute $insertAddress." . mysqli_error($conn);
    }
    echo '<p>Thank your details have been validated </p>';
}



}