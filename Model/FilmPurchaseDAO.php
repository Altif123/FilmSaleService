<?php
/**
 * Created by PhpStorm.
 * User: Altif Ali
 * Date: 27/04/2019
 * Time: 20:15
 */

class FilmPurchaseDAO
{
    public function getFilmId($film)
    {
        $conn = new mysqli('localhost', 'root', '', 'filmsaleservice');
        $getQuery = "SELECT filmid FROM fss_film WHERE filmtitle = '$film'";
        $getTitle = mysqli_query($conn, $getQuery);
        $Row = $getTitle->fech_assoc();
        return $Row['filmid'];
    }

    public function purchase($filmid, $price, $shopid, $payid)
    {
        $conn = new mysqli('localhost', 'root', '', 'filmsaleservice');
            $query = "INSERT INTO fss_filmpurchase (price, filmid, shopid,payid) VALUES ($price,$filmid ,$shopid,$payid)";
            mysqli_query($conn, $query);
        }

}