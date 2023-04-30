<?php
require "includes/repetitions/header.php";
require "includes/db/db_manager_connection.php";

if(isset($_POST['update'])){
    $id = $_GET['id'];
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $size = $_POST['size'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];

$sql = "UPDATE products SET name = '{$name}', gender = '{$gender}', size = '{$size}', quantity = '{$quantity}', price = '{$price}' WHERE id = '{$id}'";

    if (mysqli_query($conn, $sql)) {
        ?><script>
            window.location.replace('edit_product.php');
            
        </script>
        <?php
        
    } else {
        echo "Error updating record: ".mysqli_error($conn);
    }

mysqli_close($conn);
}
else{
    header("Location: edit-product.php");
    exit();
}

?>