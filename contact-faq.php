<?php
require("includes/db/db_connection.php");
function validate($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$firstname = validate($_POST['firstname']);
$email = validate($_POST['email']);
$subject = validate($_POST['subject']);
$message = validate($_POST['message']);

$sql = "INSERT INTO FAQ(name, email, subject, message) VALUES ('{$firstname}', '{$email}', '{$subject}', '{$message}')";

if(mysqli_query($conn, $sql)){

}
else{
    
}

?>