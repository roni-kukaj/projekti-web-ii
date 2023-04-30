<?php
require("../db/db_connection.php");
session_start();

if(isset($_SESSION['user_name'])){
    $verify_sql = "SELECT * FROM products WHERE id=".$_GET['product_id'];
    $result = mysqli_query($conn, $verify_sql);
    if(mysqli_num_rows($result) === 1){
        $sql = "INSERT INTO cart (user_id, product_id) VALUES ({$_SESSION['id']}, {$_GET['product_id']})";
        if(mysqli_query($conn, $sql)){
            header("Location: ../../shop.php?status=success");
            exit();
        }
        else{
            header("Location: ../../shop.php?status=failed");
        }
    }
    
} else{
    header("Location: ../../shop.php");
    exit();
}

?>