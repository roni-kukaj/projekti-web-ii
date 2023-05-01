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

    $errors=array();
    
    if(!empty($_FILES['updatePhoto']['name'])) {
        if(isset($_FILES['updatePhoto']) && empty($errors)){
            $file_name = $_FILES['updatePhoto']['name'];
            $file_type = $_FILES['updatePhoto']['type'];
            $file_size = $_FILES['updatePhoto']['size'];
            $file_tmp = $_FILES['updatePhoto']['tmp_name'];
            $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
            $allowed_exts = array('jpg', 'jpeg', 'png', 'gif');
            $max_file_size = 5000000; // 5 MB
            $min_width = 250;
            $max_width = 1600;
            $min_height = 250;
            $max_height = 1200;
            $min_resolution = 72;
            $max_resolution = 300;

            if(!in_array($file_ext, $allowed_exts)){
                $errors['updatePhoto_error'] = "The file extension is not valid! Please choose: jpg, gif or png!";
            }
            else if($file_size > $max_file_size){
                $errors['updatePhoto_error'] = "The file is too big!";
            }
        
            else{
                if(empty($errors)){
                    $new_file_name = uniqid().".".$file_ext;
                    if(move_uploaded_file($file_tmp, "../assets/images/products/".$new_file_name)){
                        $update_picture_query = "UPDATE products SET picture='assets/images/products/".$new_file_name."' WHERE id = '{$id}'";
                        if(mysqli_query($conn, $update_picture_query)){

                        }
                        else{
                            $errors['updatePhoto_error'] = "The file could not be saved!";
                        }
                    }
                    else{
                        $errors['updatePhoto_error'] = "Something went wrong with uploading the file!";
                    }
                }
            }
        }
    }
    if(!empty($errors)){
        $query_string = http_build_query($errors);
        $url = "edit-product.php?id={$id}&".$query_string;
        ?> 
        <script>window.location.replace('<?php echo $url; ?>');</script>
        <?php
    }
    else{
        $sql = "UPDATE products SET name = '{$name}', gender = '{$gender}', size = '{$size}', quantity = '{$quantity}', price = '{$price}' WHERE id = '{$id}'";
        if (mysqli_query($conn, $sql)) {
            ?><script>
                window.location.replace('edit-product.php');
            </script>
            <?php
        } else {
            echo "Error updating record: ".mysqli_error($conn);
        }
    }
}
else{
    header("Location: edit-product.php");
    exit();
}

?>