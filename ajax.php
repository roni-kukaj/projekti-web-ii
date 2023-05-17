<?php

require("TEST/contact-faq.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   /* $firstname = $_POST['firstname'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];*/

    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $subject = mysqli_real_escape_string($conn, $_POST['subject']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    $sql = "INSERT INTO messages (firstname, email, subject, message) VALUES ('{$firstname}', '{$email}', '{$subject}', '{$message}')";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$firstname, $email, $subject, $message]);

    if ($stmt->rowCount() > 0) {
        echo "success";
    } else {
        echo "error";
    }
} else {
    echo "error";
}
?>

