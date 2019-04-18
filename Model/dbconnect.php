<?php
define('DB_USER','root');
define('DB_PASSWORD','');
define('DB_HOST','localhost');
define('DB_NAME','filmsaleservice');

$conn = @mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME)
OR die('could not connect to MySQL: '.mysqli_connect_error());

mysqli_set_charset($conn,'utf8');