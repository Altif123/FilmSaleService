<?php
include '../Model/filmDAO.php';

/**
 * Created by PhpStorm.
 * User: Altif Ali
 * Date: 26/04/2019
 * Time: 15:19
 */
//function that displays the basket

function displayBasket()
{
    $filmDao = new FilmDAO();
    //$getMovie = $filmDao->getPrice($film);
    $basket = $_SESSION['basket'];

    echo '

    <table>
    <tr>
    <th>Film</th>
    <th>Price</th>
    <th>Remove</th>
    </tr>
    ';
    foreach ($basket as $key => $film) {
        echo '<tr>';
        echo '<td>' . $film . '</td>';
        echo '<td>' . $filmDao->getPrice($film) . '</td>';
        echo "<td><a href='../View/basketView.php?removeFilm={$key}'>remove </a> <td>";
        echo '</tr>';
    }


    function removeItem()
    {
        if (isset($_GET['removeFilm'])) {
            unset($_SESSION['basket'][$_GET['removeFilm']]);
        }
    }
}
















