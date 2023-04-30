<?php if(!empty($_FILES['profilepicture']['name'])) {
        if(isset($_FILES['profilepicture']) && empty($errors)){
            $file_name = $_FILES['profilepicture']['name'];
            $file_type = $_FILES['profilepicture']['type'];
            $file_size = $_FILES['profilepicture']['size'];
            $file_tmp = $_FILES['profilepicture']['tmp_name'];
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
                $errors['profilepicture_error'] = "The file extension is not valid! Please choose: jpg, gif or png!";
            }
            else if($file_size > $max_file_size){
                $errors['profilepicture_error'] = "The file is too big!";
            }
        
            else{
                if(empty($errors)){
                    $new_file_name = uniqid().".".$file_ext;
                    if(move_uploaded_file($file_tmp, "../../assets/images/products/".$new_file_name)){
                        $update_picture_query = "UPDATE users SET profile_picture='assets/images/products/".$new_file_name."' WHERE id=".$_SESSION['id'];
                        if(mysqli_query($conn, $update_picture_query)){
                            $_SESSION['products'] = "assets/images/products/".$new_file_name;
                            echo $new_file_name;
                        }
                        else{
                            $errors['profilepicture_error'] = "The file could not be saved!";
                        }
                    }
                    else{
                        $errors['profilepicture_error'] = "Something went wrong with uploading the file!";
                    }
                }
            }
        }
    }
    ?>