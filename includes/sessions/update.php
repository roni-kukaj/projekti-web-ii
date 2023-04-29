<?php  
require("../db/db_connection.php");
require("../validation/validation.php");
if(!isset($_SESSION['user_name'])){
    ?>
   <script>
    window.location.replace('index.php');
   </script>
<?php }

if(isset($_POST['update'])){
    session_start();

    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if(!validate_firstname($_POST['emri'])){
        header("Location: ../../update-page.php?error=The name you have entered is not valid!");
        exit();
    }
    if(!validate_lastname($_POST['mbiemri'])){
        header("Location: ../../update-page.php?error=The lastname you have entered is not valid!");
        exit();
    }
    if(!empty($_POST['oldpassword']) && !empty($_POST['password'] && !empty($_POST['confirmpassword']))){

        $old_password = validate($_POST['oldpassword']);
        $verify_query = "SELECT * FROM users WHERE id = ".$_GET['id'];
        $result = mysqli_query($conn, $verify_query);
        if(mysqli_num_rows($result) === 1){
            $row = mysqli_fetch_assoc($result);
            if(!password_verify($old_password, $row['password'])){
                header("Location: ../../update-page.php?error=The password is incorrect!");
                exit();
            }
        }
        else{
            header("Location: ../../update-page.php?error=Something went wrong!");
            exit();
        }

        $password = validate($_POST['password']);
        $confirm_password = validate($_POST['confirmpassword']);

        if(!validate_password($password)){
            header("Location: ../../update-page.php?error=The password must be a combination of uppercase and lowercase letters, numbers, and symbols!");
            exit();
        }
        if($password !== $confirm_password){
            header("Location: ../../update-page.php?error=The passwords do not match!");
            exit();
        }
            $sql = "UPDATE users SET password='".password_hash($password, PASSWORD_BCRYPT)."' WHERE id=".$_GET['id'];
            mysqli_query($conn,$sql);
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