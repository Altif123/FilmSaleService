<?php
/**
 * Created by PhpStorm.
 * User: Altif Ali
 * Date: 19/04/2019
 * Time: 12:05
 */

//$dao = new CustomerDAO();
//$register = $dao->registerDetails();

//
//function getDetailsViaEmail($email){
//    $conn = new mysqli('localhost', 'root', '', 'filmsaleservice');
//    $getGetPrevsql="
//SELECT pers.personname,pers.personphone,pers.personemail,fss_customer.custpassword,fss_address.addstreet ,fss_address.addpostcode,fss_address.addcity
//FROM fss_Person AS pers
//INNER JOIN fss_customeraddress AS custadd ON pers.personid = custadd.custid
//INNER JOIN fss_Address ON fss_address.addid = custadd.addid
//INNER JOIN fss_customer ON pers.personid = custadd.custid
//WHERE pers.personemail = '$email'
//LIMIT 1"  ;
//
//    while($result=mysqli_fetch_array($getGetPrevsql)){
//        $prevName=$result["personname"];
//        $prevNumber=$result["personphone"];
//        echo $prevName;
//        echo $prevNumber;
//    }
//
//}
