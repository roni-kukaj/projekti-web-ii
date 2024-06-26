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
            // header("Location: contact.php?status=success");
            // exit();
        }
        else{
            // header("Location: contact.php?status=failed");
            // exit();
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

<?php /*
require("contact-faq.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   /* $firstname = $_POST['firstname'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

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

<script type="text/javascript">
  $(document).ready(function() {
    $("#contact-form").submit(function(e) {
      e.preventDefault(); 

      $.ajax({
        url: 'contact-faq.php',
        type: 'POST',
        data: $(this).serialize(),
        success: function(response) {
          $("#name").val('');
          $("#email").val('');
          $("#subject").val('');
          $("#message").val('');

          $("#success").text("Message sent successfully");
        },
        error: function() {
          $("#success").text("Error sending the message");
        }
      });
    });
  });
</script>
*/

?>

<?php
// require("contact-faq.php");

// $dbhost = "localhost";
// $dbuser = "your_database_username";
// $dbpass = "your_database_password";
// $dbname = "your_database_name";

// $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
// if (!$conn) {
//     die("Connection failed: ".mysqli_connect_error());
// }

// if (isset($_POST['contact'])) {
//     $name = $_POST['firstname'];
//     $email = $_POST['email'];
//     $subject = $_POST['subject'];
//     $message = $_POST['message'];

//     $sql = "INSERT INTO contact_messages (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";
//     if (mysqli_query($conn, $sql)) {
//         $response = "success";
//     } else {
//         $response = "failed";
//     }

//     mysqli_close($conn);
//     echo $response;
// }
?>
