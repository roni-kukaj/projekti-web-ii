<?php
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['email-input']) && isset($_POST['password-input'])){
    session_start();

    include "../db/db_connection.php";
    if(isset($_POST['email-input']) && isset($_POST['password-input'])){
        function validate($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    }
    $email = validate($_POST['email-input']);
    $password = validate($_POST['password-input']);

    if(empty($email)){
        header("Location: ../../index.php?error=Email is required!");
        exit();
    }
    else if(empty($password)){
        header("Location: ../../index.php?error=Password is required!");
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
            header("Location: ../../index.php");
            exit();
        }
        else{
            header("Location: ../../index.php?error=Incorrect email or password!");
            exit();
        }
    }
}
?>