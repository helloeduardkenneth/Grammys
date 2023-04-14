<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
<<<<<<< HEAD


$db_name = 'mysql:host=localhost;dbname=mbaloyo';
$user_name = 'root';
$user_password = '';
 
/* Attempt to connect to MySQL database */


$link = new PDO($db_name, $user_name, $user_password);
 
=======
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'mbaloyo');
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
>>>>>>> 0bcdd2d0c9b5d26c9214fa2a1b4447c68ce7f31d
?>