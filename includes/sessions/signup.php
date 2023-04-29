<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    session_start();

    include "../db/db_connection.php";
    require "../validation/validation.php";

    $errors = array();

    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $firstname = validate($_POST['firstname']);
    $lastname = validate($_POST['lastname']);
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);
    $confirm_password = validate($_POST['confirmpassword']);

    if(empty($firstname)){
        header("Location: ../../signup-page.php?error=Firstname is empty!");
        exit();
    }
    if(empty($lastname)){
        header("Location: ../../signup-page.php?error=Lastname is empty!");
        exit();
    }
    if(empty($email)){
        header("Location: ../../signup-page.php?error=Email is empty!");
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
    if($_POST['password'] !== $_POST['confirmpassword']){
        $errors['confirmpassword_error'] = "Passwords don't match!";
    }

    if(!validate_firstname($firstname)){
        $errors['firstname_error'] = "The firstname is not valid";
    }
    if(!validate_lastname($lastname)){
        $errors['lastname_error'] = "The lastname is not valid";
    }
    if(!validate_email($email)){
        $errors['email_error'] = "The email is not valid!";
    }
    if(!validate_password($password)){
        $errors['password_error'] = "The password must include lowercase characters, uppercase characters, numbers and symbols!";
    }

    if(!empty($errors)){
        $query_string = http_build_query($errors);
        $url = "../../signup-page.php?".$query_string;
        header("Location: {$url}");
        exit();
    }

    $password = password_hash($password, PASSWORD_BCRYPT);

    $sql = "INSERT INTO users (emri, mbiemri, email, password) VALUES ('$firstname', '$lastname', '$email', '$password')";
    $result = mysqli_query($conn, $sql);

    if($result){
        header("Location: ../../login-page.php");
        exit();
    } else{
        header("Location: ../../signup-page.php?error=Failed to insert data!");
        exit();
    }
}
?>