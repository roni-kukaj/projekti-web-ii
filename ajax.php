<?php
    require("includes/db/db_connection.php");
 
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $subject = mysqli_real_escape_string($conn, $_POST['subject']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);
    

    $sql = "INSERT INTO FAQ(name, email, subject, message) VALUES ('{$firstname}', '{$email}', '{$subject}', '{$message}')";

   
?>

