<?php 
//Start Session
session_start();

//Create constants to store non repeating values
define('SITEURL', 'http://localhost/labs/project/');
define('LOCALHOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'food-order');

$conn = mysqli_connect(LOCALHOST, 'root', '') or die(mysqli_error()); //Database Connection
$db_select = mysqli_select_db($conn, 'food-order') or die(mysqli_error());//selecting database

?>