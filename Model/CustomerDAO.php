<?php
/**
 * Created by PhpStorm.
 * User: Altif Ali
 * Date: 19/04/2019
 * Time: 11:08
 */
require_once "../Model/DAO.php";
class CustomerDAO extends DAO
{

    public function registerDetails($fName, $phone, $email, $address, $city, $postcode, $password)
    {

        $conn = new mysqli('localhost', 'root', '', 'filmsaleservice');
        $insertAddress = "INSERT INTO fss_address (addstreet,addcity,addpostcode)VALUES ('$address','$city','$postcode')";
        $insertPersonName = "INSERT INTO fss_Person (personname,personphone,personemail)VALUES ('$fName','$phone','$email')";

        if (mysqli_query($conn, $insertAddress) && mysqli_query($conn, $insertPersonName)) {
            echo "Your details have now been registerd ";
        } else {
            echo "error, unable to execute $insertPersonName.$insertAddress" . mysqli_error($conn);
        }

        $getID = mysqli_insert_id($conn);
        $insertPassword = "INSERT INTO fss_customer (custid,custregdate,custendreg,custpassword)VALUES ('$getID' ,current_date,'','$password')";
        if(mysqli_query($conn, $insertPassword)){
            echo '<p>Password also registered</p>';
        } else {
            echo '<p>error, unable to execute $insertPassword. . mysqli_error($conn)</p>';
        }

        /*
            if (mysqli_query($conn, $insertAddress)) {
                echo "address records added";
            } else {
                echo "error, unable to execute $insertAddress." . mysqli_error($conn);
            }
            echo '<p>Thank your details have been validated </p>';
        */
        /*
            $getID = mysqli_insert_id($conn);
            $insertPassword = "INSERT INTO fss_customer (custid,custregdate,custendreg,custpassword)VALUES ('$getID' ,current_date,'','$password')";

            if (mysqli_query($conn, $insertPassword)) {
                echo "password records added";
            } else {
                echo "error, unable to execute $insertPassword." . mysqli_error($conn);
            }
            echo '<p>Thank you your details have been validated </p>';
        }
        */




    }
    //update query


}


