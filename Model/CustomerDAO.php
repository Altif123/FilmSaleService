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


        $insertPersonName = "INSERT INTO fss_person (personname,personphone,personemail)VALUES ('$fName','$phone','$email')";
        $insertAddress = "INSERT INTO fss_address (addstreet,addcity,addpostcode)VALUES ('$address','$city','$postcode')";


        if (mysqli_query($conn, $insertAddress)) {
            echo "Your address has now been registered ";
            $getAddid = mysqli_insert_id($conn) ;
        } else {
            echo "error, unable to execute $insertPersonName. . $insertAddress" . mysqli_error($conn);
        }
        if (mysqli_query($conn, $insertPersonName)){
            echo "Your details have now been registered ";
            $getID =mysqli_insert_id($conn) ;
        }
        //$getID = mysqli_insert_id($conn);
        $insertPassword = "INSERT INTO fss_customer (custid,custregdate,custendreg,custpassword)VALUES ('$getID' ,current_date,'','$password')";
        if(mysqli_query($conn, $insertPassword)){
            echo '<p>Password also registered</p>';
        } else {
            echo '<p>error, unable to execute $insertPassword. . mysqli_error($conn)</p>';
        }
        $insertCustAddress= "INSERT INTO fss_customeraddress (custid,addid) VALUES ('$getID','$getAddid')";
        if(mysqli_query($conn,$insertCustAddress)){
            echo '<p>link table updated</p>';

        }

    }
    //update query

public function previousOrders(){
    $conn = new mysqli('localhost', 'root', '', 'filmsaleservice');


    $displayQuery ="SELECT pers.personname AS 'Name',filmpurch.payid AS 'Payment Number',film.filmtitle AS 'Film Title'
FROM fss_Person pers
JOIN fss_OnlinePayment AS onlinepay
ON pers.personid = onlinepay.custid
JOIN fss_FilmPurchase AS filmpurch
ON filmpurch.payid = onlinepay.payid
JOIN fss_Film AS film
ON filmpurch.filmid = film.filmid
WHERE pers.personemail = 'melissa.dejesus@home.co.uk'
GROUP BY film.filmtitle";
    $displayPrevOrders = mysqli_query($conn,$displayQuery);

    echo "<table> 
    <tr> 
    <th>Payment id</th>
    <th>Film Title</th>
    </tr>" ;
    if (mysqli_num_rows($displayPrevOrders) > 0) {
        // output data of each row
        while($row = mysqli_fetch_array($displayPrevOrders,MYSQLI_ASSOC)) {
            echo "<tr>";
            echo "<td>" .$row['Payment Number']. "</td>";
            echo "<td>" .$row['Film Title']."</td>";
            echo "<tr>";
        }
    } else {
        echo "0 results";
    }

}
}


