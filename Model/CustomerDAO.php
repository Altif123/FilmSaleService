
<?php
/**
 * Created by PhpStorm.
 * User: Altif Ali
 * Date: 19/04/2019
 * Time: 11:08
 */
include_once "../View/layout/header.php";
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

    //get details via email


//make a function to retrieve the detsils
public function updateDetails($email){
$nameup= "UPDATE" ;

}

public function previousOrders()
{
    $userEmail = $_SESSION['user_id'];
    $conn = new mysqli('localhost', 'root', '', 'filmsaleservice');
    $displayQuery = "SELECT pers.personname AS 'Name',filmpurch.payid AS 'Payment Number',film.filmtitle AS 'Film Title'
FROM fss_Person pers
JOIN fss_OnlinePayment AS onlinepay
ON pers.personid = onlinepay.custid
JOIN fss_FilmPurchase AS filmpurch
ON filmpurch.payid = onlinepay.payid
JOIN fss_Film AS film
ON filmpurch.filmid = film.filmid
WHERE pers.personemail = '$userEmail'
GROUP BY film.filmtitle";
    $displayPrevOrders = mysqli_query($conn, $displayQuery);

    echo "<table> 
    <tr> 
    <th>Payment id</th>
    <th style=' font-family: Calibri, serif;text-align: center; border-bottom: 1px black ;'>Film Title</th>
    </tr>";
    if (mysqli_num_rows($displayPrevOrders) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_array($displayPrevOrders, MYSQLI_ASSOC)) {
            echo "<tr >";
            echo "<td>" . $row['Payment Number'] . "</td>";
            echo "<td>" . $row['Film Title'] . "</td>";
            echo "<tr>";
        }
    } else {
        echo '<p style="text-align: center; color: black;padding:10px;font-family: Calibri, serif; font-family: Calibri, serif">"0 results found, to make an order please browse then add to basket"</p>';
    }
}
//get user details queries

    public function getName(){
        $userEmail = $_SESSION['user_id'];
        $conn = new mysqli('localhost', 'root', '', 'filmsaleservice');
        $getQuery = "SELECT personname FROM fss_person WHERE personemail='$userEmail'";
        $retreiveName =mysqli_query($conn,$getQuery);
        $nameRow =$retreiveName->fetch_assoc();
        return $nameRow['personname'];
    }
    public function getEmail(){
        $userEmail = $_SESSION['user_id'];
        $conn = new mysqli('localhost', 'root', '', 'filmsaleservice');
        $getQuery = "SELECT personemail FROM fss_person WHERE personemail='$userEmail'";
        $retreiveEmail =mysqli_query($conn,$getQuery);
        $nameRow =$retreiveEmail->fetch_assoc();
        return $nameRow['personemail'];
    }
    public function getPhone(){
        $userEmail = $_SESSION['user_id'];
        $conn = new mysqli('localhost', 'root', '', 'filmsaleservice');
        $getQuery = "SELECT personphone FROM fss_person WHERE personemail='$userEmail'";
        $retreivePhone =mysqli_query($conn,$getQuery);
        $phoneRow =$retreivePhone->fetch_assoc();
        return $phoneRow['personphone'];
    }
    public function getStreet(){
        $userEmail = $_SESSION['user_id'];
        $conn = new mysqli('localhost', 'root', '', 'filmsaleservice');
        $getQuery = "SELECT fss_address.addstreet FROM fss_Person AS pers
                     INNER JOIN fss_customeraddress AS custadd ON pers.personid = custadd.custid
                     INNER JOIN fss_Address ON fss_address.addid = custadd.addid
                     WHERE pers.personemail = '$userEmail'";
        $retreiveStreet =mysqli_query($conn,$getQuery);
        $streetRow =$retreiveStreet->fetch_assoc();
        return $streetRow['addstreet'];
    }
    public function getPostcode(){
        $userEmail = $_SESSION['user_id'];
        $conn = new mysqli('localhost', 'root', '', 'filmsaleservice');
        $getQuery = "SELECT fss_address.addpostcode FROM fss_Person AS pers
                     INNER JOIN fss_customeraddress AS custadd ON pers.personid = custadd.custid
                     INNER JOIN fss_Address ON fss_address.addid = custadd.addid
                     WHERE pers.personemail = '$userEmail'";
        $retreivePostcode =mysqli_query($conn,$getQuery);
        $postRow =$retreivePostcode->fetch_assoc();
        return $postRow['addpostcode'];
    }
    public function getCity(){
        $userEmail = $_SESSION['user_id'];
        $conn = new mysqli('localhost', 'root', '', 'filmsaleservice');
        $getQuery = "SELECT fss_address.addcity FROM fss_Person AS pers
                     INNER JOIN fss_customeraddress AS custadd ON pers.personid = custadd.custid
                     INNER JOIN fss_Address ON fss_address.addid = custadd.addid
                     WHERE pers.personemail = '$userEmail'";
        $retreiveCity =mysqli_query($conn,$getQuery);
        $cityRow =$retreiveCity->fetch_assoc();
        return $cityRow['addcity'];
    }
    public function getPassword(){
        $userEmail = $_SESSION['user_id'];
        $conn = new mysqli('localhost', 'root', '', 'filmsaleservice');
        $getQuery = "SELECT custpassword FROM fss_person INNER JOIN fss_customer ON fss_person.personid =fss_customer.custid
WHERE fss_person.personemail = '$userEmail'";
        $retreiveStreet =mysqli_query($conn,$getQuery);
        $streetRow =$retreiveStreet->fetch_assoc();
        return $streetRow['custpassword'];
    }




    //update queries
    public function updateName($newName){
        $conn = new mysqli('localhost', 'root', '', 'filmsaleservice');

        $updateName= "UPDATE fss_person SET personname = '$newName' WHERE personemail = '{$_SESSION['user_id']}' ";
        if(mysqli_query($conn,$updateName)){
            echo 'Name successfully updated';
        }else{
            echo 'error updating name, please';
        }

    }
    public function updatePhone($newPhone){
        $conn = new mysqli('localhost', 'root', '', 'filmsaleservice');

        $updatePhone= "UPDATE fss_person SET personphone = '$newPhone' WHERE '{$_SESSION['user_id']}' ";
        if(mysqli_query($conn,$updatePhone)){
            echo 'Phone successfully updated';
        }else{
            echo 'error updating phone, please try again';
        }

    }
    public function updateEmail($newEmail){
        $conn = new mysqli('localhost', 'root', '', 'filmsaleservice');

        $updateEmail= "UPDATE fss_person SET personemail = '$newEmail' WHERE '{$_SESSION['user_id']}' ";
        if(mysqli_query($conn,$updateEmail)){
            echo 'email successfully updated';
        }else{
            echo '<p>error updating email</p>p>';
        }

    }
    public function updatePassword($newPassword){
        $conn = new mysqli('localhost', 'root', '', 'filmsaleservice');

        $updatePass= "UPDATE fss_customer SET custpassword = '$newPassword' WHERE custid = (SELECT personid 
                                                                                            FROM fss_person
                                                                                            WHERE fss_person.personemail = '{$_SESSION['user_id']}') ";
        if(mysqli_query($conn,$updatePass)){
            echo 'password successfully updated';
        }else{
            echo 'error updating';
        }

    }
    public function updateAddress($newAddress){
        $conn = new mysqli('localhost', 'root', '', 'filmsaleservice');

        $updateAdd= "UPDATE fss_address SET addstreet = '$newAddress' WHERE (SELECT addid
                                                                            FROM fss_customeraddress
                                                                            JOIN fss_person ON fss_customeraddress.custid = fss_person.personid
                                                                            WHERE fss_person.personemail = '{$_SESSION['user_id']}') ";
        if(mysqli_query($conn,$updateAdd)){
            echo 'address successfully updated';
        }else{
            echo 'error updating address';
        }

    }
    public function updateCity($newCity){
        $conn = new mysqli('localhost', 'root', '', 'filmsaleservice');

        $updateAdd= "UPDATE fss_address SET addcity = '$newCity' WHERE (SELECT addid
                                                                            FROM fss_customeraddress
                                                                            JOIN fss_person ON fss_customeraddress.custid = fss_person.personid
                                                                            WHERE fss_person.personemail = '{$_SESSION['user_id']}') ";
        if(mysqli_query($conn,$updateAdd)){
            echo '<p>address city successfully updated<p>';
        }else{
            echo 'error updating address';
        }

    }
    public function updatePostcode($newpostcode){
        $conn = new mysqli('localhost', 'root', '', 'filmsaleservice');

        $updateAdd= "UPDATE fss_address SET addpostcode = '$newpostcode' WHERE (SELECT addid
                                                                            FROM fss_customeraddress
                                                                            JOIN fss_person ON fss_customeraddress.custid = fss_person.personid
                                                                            WHERE fss_person.personemail = '{$_SESSION['user_id']}') ";
        if(mysqli_query($conn,$updateAdd)){
            echo 'address  postcode successfully updated';
        }else{
            echo 'error updating address postcode';
        }

    }

}



