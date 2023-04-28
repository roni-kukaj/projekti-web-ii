<?php  
require("../db/db_connection.php");

if(isset($_POST['update'])){
    session_start();
    $query = "UPDATE users SET emri='".$_POST['emri']."', mbiemri='".$_POST['mbiemri']."' WHERE id=".$_GET['id'];

    $query_run = mysqli_query($conn,$query);

    if($query_run){
        $_SESSION['user_name'] = $_POST['emri'];
        $_SESSION['mbiemri'] = $_POST['mbiemri'];
        header("Location: ../../profile.php");
        exit();
    }else{
        echo "Data not updated";
    }
}
?>