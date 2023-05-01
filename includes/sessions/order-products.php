<?php
require "../db/db_connection.php";
session_start();
$sql = "SELECT * FROM cart WHERE user_id=".$_SESSION['id'];
$result = mysqli_query($conn, $sql);
$product_ids = array();
setcookie('order_address', $_POST['address'], time() + (86400 * 30), '/');
if(mysqli_num_rows($result) > 0){
    $insert_order_query = "INSERT INTO orders(user_id, address, total_price) VALUES ({$_SESSION['id']}, '{$_POST['address']}', {$_SESSION['total_price']})";
    if(mysqli_query($conn, $insert_order_query)){
        unset($_SESSION['total_price']);
        $get_order_id_query = "SELECT id FROM orders WHERE user_id={$_SESSION['id']} ORDER BY order_date DESC LIMIT 1";
        $result_order_id = mysqli_query($conn, $get_order_id_query);
        if(mysqli_num_rows($result_order_id) === 1){
            $id_row = mysqli_fetch_assoc($result_order_id);
        }
        while($row = mysqli_fetch_assoc($result)){
            $insert_product_list_query = "INSERT INTO product_list (order_id, product_id) VALUES ({$id_row['id']}, {$row['product_id']})";
            mysqli_query($conn, $insert_product_list_query);
            $update_product_quantity_query = "UPDATE products SET quantity = quantity - 1 WHERE id={$row['product_id']}";
            mysqli_query($conn, $update_product_quantity_query);
            $delete_cart_query = "DELETE FROM cart WHERE product_id={$row['product_id']} AND user_id={$_SESSION['id']}";
            mysqli_query($conn, $delete_cart_query);
        }
        header("Location: ../../cart.php");
    }
}
else {
    header("Location: ../../cart.php?error=Something went wrong while ordering!");
    exit();
}

?>