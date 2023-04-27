<?php
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['email']) && isset($_POST['password'])){
    session_start();

    include "../db/db_connection.php";
    if(isset($_POST['email']) && isset($_POST['password'])){
        function validate($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    }
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);

    if(empty($email)){
        header("Location: ../../login-page.php?error=Email is empty!");
        exit();
    }
    else if(empty($password)){
        header("Location: ../../login-page.php?error=Password is empty!");
        exit();
    }

    $sql = "SELECT * FROM users WHERE email = '".$email."'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) === 1){
        $row = mysqli_fetch_assoc($result);
        if($row['email'] === $email && password_verify($password, $row['password'])){
            $_SESSION['user_email'] = $row['email'];
            $_SESSION['user_name'] = $row['emri'];
            $_SESSION['id'] = $row['id'];
            $_SESSION['profile_picture'] = $row['profile_picture'];
            header("Location: ../../index.php");
            exit();
        }
        else{
            header("Location: ../../login-page.php?error=The email or password you have provided is incorrect!");
            exit();
        }
    }
    else{
        header("Location: ../../login-page.php?error=The email or password you have provided is incorrect!");
        exit();
    }
}
?>