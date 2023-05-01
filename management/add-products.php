<?php
require "includes/db/db_manager_connection.php";

if(!isset($_SESSION['role'])){
    ?>
        <script>window.location.replace("management/index.php");</script>
    <?php
}

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $size = $_POST['size'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];

    $errors=array();

    if(strlen($name) > 30){
        $errors['name_error'] = "The name must not be longer than 30 characters!";
    }
    if($size < 20 || $size > 50){
        $errors['size_error'] = "The size must be bigger than 20 and smaller than 50!";
    }
    if($quantity < 0){
        $errors['quantity_error'] = "The quantity must be a positive number!";
    }
    if($price < 0){
        $errors['price_error'] = "The price must be a positive number!";
    }
    if(empty($_FILES['photo']['name'])){
        $errors['photo_error'] = "This fiels is required";
    }
    else{
        if(isset($_FILES['photo']) && empty($errors)){
            $file_name = $_FILES['photo']['name'];
            $file_type = $_FILES['photo']['type'];
            $file_size = $_FILES['photo']['size'];
            $file_tmp = $_FILES['photo']['tmp_name'];
            $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
            $allowed_exts = array('jpg', 'jpeg', 'png', 'gif');
            $max_file_size = 5000000; // 5 MB

            if(!in_array($file_ext, $allowed_exts)){
                $errors['photo_error'] = "The file extension is not valid! Please choose: jpg, gif or png!";
            }
            else if($file_size > $max_file_size){
                $errors['photo_error'] = "The file is too big!";
            }
            else{
                if(empty($errors)){
                    $new_file_name = uniqid().".".$file_ext;
                    if(move_uploaded_file($file_tmp, "../assets/images/products/".$new_file_name)){
                        $insert_picture_query = "INSERT INTO products (name, gender, size, quantity, price, picture) VALUES ('{$name}', '{$gender}', {$size}, {$quantity}, {$price}, 'assets/images/products/{$new_file_name}')";
                        if(mysqli_query($conn, $insert_picture_query)){
                            
                        }
                        else{
                            $errors['photo_error'] = "The file could not be saved!";
                        }
                    }
                    else{
                        $errors['error'] = "Something went wrong!";
                    }
                }
            }
        }
    }
    if(!empty($errors)){
        $query_string = http_build_query($errors);
        $url = "products.php?".$query_string;
        ?> 
        <script>window.location.replace('<?php echo $url; ?>');</script>
        <?php
    }
    else{
        ?><script>
            window.location.replace('products.php');
        </script>
        <?php
    }
}
else {
    header("Location: products.php");
}
?>