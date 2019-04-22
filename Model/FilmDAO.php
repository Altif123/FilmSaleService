<?php
/**
 * Created by PhpStorm.
 * User: Altif Ali
 * Date: 17/04/2019
 * Time: 14:07
 */
include "../Model/DAO.php";

class FilmDAO extends DAO {



    public function getAllFilmDesc($chosen)
    {

        //$dao = new DAO();
        $conn = new mysqli('localhost', 'root', '', 'filmsaleservice');
       // $conn = $dao->dbConnection();
        $sql = "SELECT filmdescription FROM fss_Film WHERE fss_Film.filmtitle = '$chosen'";//all film query
        $displayDesc = mysqli_query($conn, $sql);
        $descRow = $displayDesc->fetch_assoc();
        return $descRow["filmdescription"];


    }
    public function getRating($chosen){
        $conn = new mysqli('localhost', 'root', '', 'filmsaleservice');
        $getRating = "SELECT filmrating FROM fss_rating 
        JOIN fss_film ON fss_film.ratid = fss_rating.ratid
        WHERE fss_film.filmtitle = \"$chosen\"";
        $displayRating =mysqli_query($conn,$getRating);
        $ratingRow =$displayRating->fetch_assoc();
        return $ratingRow["filmrating"];

    }
    public function getPrice($chosen){

        $conn = new mysqli('localhost', 'root', '', 'filmsaleservice');
        $getPrice = "SELECT price FROM fss_filmpurchase 
        JOIN fss_film ON fss_filmpurchase.filmid = fss_film.filmid
        WHERE fss_film.filmtitle = \"$chosen\" ORDER BY fss_filmpurchase.payid ASC LIMIT 1";//all film query
        $displayPrice = mysqli_query($conn, $getPrice);
        $priceRow = $displayPrice->fetch_assoc();
        return $priceRow["price"];
    }
    //display all films as dropdown
    public function getAllFilmTitle()
    {

        $conn = new mysqli('localhost', 'root', '', 'filmsaleservice');
        $get_all_films = "SELECT filmtitle AS Films FROM fss_film ORDER BY filmtitle ASC";//all film query
        $display_all_films = @mysqli_query($conn, $get_all_films);
        //retrieve data
        $film_option = "<select name='film'>";
        while($row = mysqli_fetch_assoc($display_all_films)){//assigns a row to a film
            $film_option .= "<option value='{$row['Films']}'> {$row['Films']}</option>";

        }

        $film_option .= "</select>";
        return $film_option;





    }

}