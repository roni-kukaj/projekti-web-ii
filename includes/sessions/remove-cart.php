<?php
require("../db/db_connection.php");
session_start();

if(isset($_SESSION['user_name'])){
    $verify_sql = "SELECT id FROM cart WHERE product_id=".$_GET['product_id']." AND user_id=".$_SESSION['id'];
    $result = mysqli_query($conn, $verify_sql);
    if(mysqli_num_rows($result) > 0){
        $data = mysqli_fetch_assoc($result);
        $sql = "DELETE FROM cart WHERE id=".$data['id'];
        if(mysqli_query($conn, $sql)){
            header("Location: ../../cart.php?status=success");
            exit();
        }
        else{
            header("Location: ../../cart.php?status=failed");
        }
    }
    
} else{
    header("Location: ../../shop.php");
    exit();
}

?>