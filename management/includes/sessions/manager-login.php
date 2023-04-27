<?php 
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['manager-username']) && isset($_POST['manager-password'])){
        session_start();
        include "../db/db_manager_connection.php";

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

        if(empty($username)){
            header("Location: ../../index.php?error=Username is empty!");
            exit();
        }
        else if(empty($password)){
            header("Location: ../../index.php?error=Password is empty!");
            exit();
        }

        $sql = "SELECT * FROM admins WHERE username = '".$username."'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) === 1){
            $row = mysqli_fetch_assoc($result);
            if($row['username'] === $username && password_verify($password, $row['password'])){
                $_SESSION['username'] = $username;
                $_SESSION['role'] = 'manager';
                $_SESSION['manager_id'] = $row['id'];
                header("Location: ../../dashboard.php");
                exit();
            }   
            else {
                header("Location: ../../index.php?error=The username or password you have provided is incorrect!");
                exit();
            }
        }
        else {
            header("Location: ../../index.php?error=The username or password you have provided is incorrect!");
            exit();
        }
    } 
    else {
        header("Location: ../../index.php?error=All fields are required!");
        exit();
    }
?>