<?php  
require("../db/db_connection.php");
require("../validation/validation.php");
session_start();
if(!isset($_SESSION['user_name'])){
    header("Location: ../../login-page.php");
}

if(isset($_POST['update'])){
    
    $errors = array();

    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if(!empty($_POST['oldpassword']) && !empty($_POST['password'] && !empty($_POST['confirmpassword'])) && empty($errors)){

        $old_password = validate($_POST['oldpassword']);
        $verify_query = "SELECT * FROM users WHERE id = ".$_SESSION['id'];
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
            $sql = "UPDATE users SET password='".password_hash($password, PASSWORD_BCRYPT)."' WHERE id=".$_SESSION['id'];
            mysqli_query($conn,$sql);
    }
    if(!validate_firstname($_POST['emri'])){
        $errors['emri_error'] = "Firstname is not valid!";
    }
    if(!validate_lastname($_POST['mbiemri'])){
        $errors['mbiemri_error'] = "Lastname is not valid!";
    }
    if(!empty($_FILES['profilepicture']['name'])) {
        if(isset($_FILES['profilepicture']) && empty($errors)){
            $file_name = $_FILES['profilepicture']['name'];
            $file_type = $_FILES['profilepicture']['type'];
            $file_size = $_FILES['profilepicture']['size'];
            $file_tmp = $_FILES['profilepicture']['tmp_name'];
            $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
            $allowed_exts = array('jpg', 'jpeg', 'png', 'gif');
            $max_file_size = 5000000; // 5 MB
            // $min_width = 250;
            // $max_width = 1600;
            // $min_height = 250;
            // $max_height = 1200;
            // $min_resolution = 72;
            // $max_resolution = 300;

            // list($width, $type, $height, $attr) = getimagesize($file_tmp);
            // $resolution = $width / ($file_size / 1024 / 1024) * 25.4;

            if(!in_array($file_ext, $allowed_exts)){
                $errors['profilepicture_error'] = "The file extension is not valid! Please choose: jpg, gif or png!";
            }
            else if($file_size > $max_file_size){
                $errors['profilepicture_error'] = "The file is too big!";
            }
            // else  if ($width < $min_width || $width > $max_width || $height < $min_height || $height > $max_height) {
            //     $errors['profilepicture_error'] = "The image dimensions should be: width(250-1600) and height(250-1200)!";
            // }
            // else if($resolution < $min_resolution || $resolution > $max_resolution){
            //     $errors['profilepicture_error'] = "The image resolution is not acceptable! Please choose another image!";
            // }
            else{
                if(empty($errors)){
                    $new_file_name = uniqid().".".$file_ext;
                    if(move_uploaded_file($file_tmp, "../../assets/images/user_profile_pictures/".$new_file_name)){
                        $update_picture_query = "UPDATE users SET profile_picture='assets/images/user_profile_pictures/".$new_file_name."' WHERE id=".$_SESSION['id'];
                        if(mysqli_query($conn, $update_picture_query)){
                            $_SESSION['profile_picture'] = "assets/images/user_profile_pictures/".$new_file_name;
                            echo $new_file_name;
                        }
                        else{
                            $errors['profilepicture_error'] = "The file could not be saved!";
                        }
                    }
                    else{
                        $errors['profilepicture_error'] = "Something went wrong with uploading the file!";
                    }
                }
            }
        }
    }

    if(!empty($errors)){
        $query_string = http_build_query($errors);
        $url = "../../update-page.php?".$query_string;
        header("Location: {$url}");
        exit();
    }
    
    $query = "UPDATE users SET emri='".$_POST['emri']."', mbiemri='".$_POST['mbiemri']."' WHERE id=".$_SESSION['id'];

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