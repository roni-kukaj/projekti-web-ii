<?php 
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['manager-username'] && isset($_POST['manager-password']))){
        if(isset($_POST['manager-username']) && isset($_POST['manager-password'])){
            function validate($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }
        }
        $username = validate($_POST['manager-username']);
        $password = validate($_POST['manager-password']);

        if(empty($email)){
            header("Location: index.php?error=Email is empty!");
            exit();
        }
        else if(empty($password)){
            header("Location: index.php?error=Password is empty!");
            exit();
        }
    
    } else {
        header("Location: index.php?error=All fields are required!");
        exit();
    }
?>