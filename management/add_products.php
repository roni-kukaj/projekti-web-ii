<?php
require "includes/db/db_manager_connection.php";

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $size = $_POST['size'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];

    $sql = "INSERT INTO products (name, gender, size, quantity, price) VALUES ('$name', '$gender', '$size', '$quantity', '$price')";
    mysqli_query($conn, $sql);

    header("Location: products.php");
    exit();
}
?>