<?php
require("includes/db/db_connection.php");
require("includes/validation/validation.php");

if(isset($_POST['contact'])){
    $errors = array();
    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    if(empty($_POST['firstname'])){
        $errors['firstname_error'] = "The firstname cannot be empty";
    }
    if(empty($_POST['email'])){
        $errors['email_error'] = "The email cannot be empty";
    }
    if(empty($_POST['subject'])){
        $errors['subject_error'] = "The subject cannot be empty";
    }
    if(empty($_POST['message'])){
        $errors['message_error'] = "The message cannot be empty";
    }
    if(!validate_firstname($_POST['firstname'])){
        $errors['firstname_error'] = "The firstname is not valid!";
    }
    if(!validate_email($_POST['email'])){
        $errors['email_error'] = "The email is not valid!";
    }
    if(strlen($_POST['message']) > 500){
        $errors['message_error'] = "TThe message cannot be longer than 500 characters!";
    }

    if(empty($errors)){
        $firstname = validate($_POST['firstname']);
        $email = validate($_POST['email']);
        $subject = validate($_POST['subject']);
        $message = validate($_POST['message']);
        
        $sql = "INSERT INTO FAQ(name, email, subject, message) VALUES ('{$firstname}', '{$email}', '{$subject}', '{$message}')";

        if(mysqli_query($conn, $sql)){
            header("Location: contact.php?status=success");
            exit();
        }
        else{
            header("Location: contact.php?status=failed");
            exit();
        }
    }
    else{
        
        $query_string = http_build_query($errors);
        $url = "contact.php?".$query_string;
        header("Location: {$url}");
        exit();
    }
}


?>