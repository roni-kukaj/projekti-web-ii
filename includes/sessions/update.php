<?php  
require("../db/db_connection.php");
require("../validation/validation.php");
if(!isset($_SESSION['user_name'])){
    header("Location: ../../login-page.php"); }

if(isset($_POST['update'])){
    session_start();
    $errors = array();

    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if(!empty($_POST['oldpassword']) && !empty($_POST['password'] && !empty($_POST['confirmpassword'])) && empty($errors)){

        $old_password = validate($_POST['oldpassword']);
        $verify_query = "SELECT * FROM users WHERE id = ".$_GET['id'];
        $result = mysqli_query($conn, $verify_query);
        if(mysqli_num_rows($result) === 1){
            $row = mysqli_fetch_assoc($result);
            if(!password_verify($old_password, $row['password'])){
                $errors['oldpassword_error'] = "The password is incorrect";
            }
        }
        else{
            $errors['error'] = "Something went wrong!";
        }

        $password = validate($_POST['password']);
        $confirm_password = validate($_POST['confirmpassword']);

        if(!validate_password($password)){
            $errors['password_error'] = "The password must be a combination of uppercase and lowercase letters, numbers, and symbols!";
        }
        if($password !== $confirm_password){
            $errors['confirmpassword_error'] = "The passwords do not match!";

        }
            $sql = "UPDATE users SET password='".password_hash($password, PASSWORD_BCRYPT)."' WHERE id=".$_GET['id'];
            mysqli_query($conn,$sql);
    }
    if(!validate_firstname($_POST['emri'])){
        $errors['emri_error'] = "Firstname is not valid!";
    }
    if(!validate_lastname($_POST['mbiemri'])){
        $errors['mbiemri_error'] = "Lastname is not valid!";
    }

    if(!empty($errors)){
        $query_string = http_build_query($errors);
        $url = "../../update-page.php?".$query_string;
        header("Location: {$url}");
        exit();
    }
    
    $query = "UPDATE users SET emri='".$_POST['emri']."', mbiemri='".$_POST['mbiemri']."' WHERE id=".$_GET['id'];

    $query_run = mysqli_query($conn,$query);
    
    if($query_run){
        $_SESSION['user_name'] = $_POST['emri'];
        $_SESSION['user_lastname'] = $_POST['mbiemri'];
        header("Location: ../../profile.php");
        
        exit();
    }else{
        header("Location: ../../update-page.php?error=Something went wrong!");
    }
}
?>