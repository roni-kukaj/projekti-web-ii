<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    session_start();

    include "../db/db_connection.php";

    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if(isset($_POST['name']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['confirm_password'])){
        function validate($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    }
    $name = validate($_POST['name']);
    $username = validate($_POST['username']);
    $password = validate($_POST['password']);
    $confirm_password = validate($_POST['confirm_password']);

    if(empty($name)){
        header("Location: ../../signup-page.php?error=Name is empty!");
        exit();
    }
    if(empty($username)){
        header("Location: ../../signup-page.php?error=Username is empty!");
        exit();
    }
    if(empty($password)){
        header("Location: ../../signup-page.php?error=Password is empty!");
        exit();
    }
    if(empty($confirm_password)){
        header("Location: ../../signup-page.php?error=Confirm Password is empty!");
        exit();
    } 
    if($_POST['password'] !== $_POST['confirm_password']){
        header("Location: ../../signup-page.php?error=Passwords don't match!");
        exit();
    }
}

$sql = "INSERT INTO users () VALUES name = '".$name."'";
    $result = mysqli_query($conn, $sql);


?>