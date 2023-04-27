<?php

$servername_db = 'localhost';
$username_db = 'root';
$password_db = "";

$db_name = "DB_SHOESHOP";

$conn = mysqli_connect($servername_db, $username_db, $password_db, $db_name);

if(!$conn){
    echo "Connection Failed!";
}

?>