<?php
/**
 * Created by PhpStorm.
 * User: Altif Ali
 * Date: 25/03/2019
 * Time: 21:54
 */

class dbconnection
{

function getConnection (){
    try {
        $conn = new PDO('msqli:host=localhost dbname=filmsalesservice', 'root', "");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch (PDOException $exception) {
        echo "sorry, connection can't be made" . $exception->getMessage();
    }



}
}



?>

