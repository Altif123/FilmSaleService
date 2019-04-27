<?php
/**
 * Created by PhpStorm.
 * User: Altif Ali
 * Date: 17/04/2019
 * Time: 14:02
 */

class DAO {



public function dbConnection(){
$host="localhost";
$username="root";
$password="";
$dbname="filmsaleservice";

mysqli($host, $username, $password, $dbname);


}

}