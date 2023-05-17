<?php
require("contact-faq.php");

$dbhost = "localhost";
$dbuser = "your_database_username";
$dbpass = "your_database_password";
$dbname = "your_database_name";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if (!$conn) {
    die("Connection failed: ".mysqli_connect_error());
}

if (isset($_POST['contact'])) {
    $name = $_POST['firstname'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $sql = "INSERT INTO contact_messages (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";
    if (mysqli_query($conn, $sql)) {
        $response = "success";
    } else {
        $response = "failed";
    }

    mysqli_close($conn);
    echo $response;
}
?>