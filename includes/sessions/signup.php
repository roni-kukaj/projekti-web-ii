<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    session_start();

    include "../db/db_connection.php";

    if(empty($name)){
        header("Location: ../../signup-page.php?error=Name is empty!");
        exit();
    }
    else if(empty($username)){
        header("Location: ../../signup-page.php?error=Username is empty!");
        exit();
    }
    else if(empty($password)){
        header("Location: ../../signup-page.php?error=Password is empty!");
        exit();
    }
}






?>