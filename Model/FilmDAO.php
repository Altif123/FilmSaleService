<?php
/**
 * Created by PhpStorm.
 * User: Altif Ali
 * Date: 17/04/2019
 * Time: 14:07
 */
require_once "../Model/DAO.php";
$chosen=$film_option;
class FilmDAO extends DAO {

    public function getAllFilmDesc($chosen)
    {
        $conn = new mysqli('localhost', 'root', '', 'filmsaleservice');
        $sql = "SELECT filmdescription FROM fss_Film WHERE fss_Film.filmtitle = '$chosen'";//all film query
        $displayDesc = mysqli_query($conn, $sql);
        $descRow = $displayDesc->fetch_assoc();
        return $descRow["filmdescription"];


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