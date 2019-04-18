<?php
/**
 * Created by PhpStorm.
 * User: Altif Ali
 * Date: 17/04/2019
 * Time: 14:02
 */

abstract class DAO {

    public $conn;

public function dbConnection(){

    try {
        $conn = new mysqli('localhost', 'root', '', 'filmsalesservice');
        //$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch (PDOException $exception) {
        echo "sorry, connection can't be made" . $exception->getMessage();
    }

}

}