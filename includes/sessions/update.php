<link rel="apple-touch-icon" href="assets/images/apple-icon.png">
<link rel="shortcut icon" type="image/x-icon" href="assets/images/shoe-favicon.png">

<link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
<link rel="stylesheet" href="../../assets/css/templatemo.css">
<link rel="stylesheet" href="../../assets/css/custom.css">
<link rel="stylesheet" href="../../assets/css/index.css">

    <!-- Load fonts style after rendering the layout styles -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
<link rel="stylesheet" href="assets/css/fontawesome.min.css"> 
 
 <?php
    include("../repetitions/header.php"); 
    if(!isset($_SESSION['user_name']))
 ?>

                    <fieldset>
                        <div class="container">
                            <label class="form-label my-1" for="emri-input"><b>Emri </b></label>
                            <input type="text" class="form-control my-1" id="emri" name="emri">
                            <p id="email-error-msg" style="display: none;" class="text-danger">This field is required</p>

                            <label class="form-label my-1" for="mbiemri-input"><b>Mbiemri </b></label>
                            <input type="text" class="form-control my-1" id="mbiemri" name="mbiemri">
                            <p id="email-error-msg" style="display: none;" class="text-danger">This field is required</p>

                            <label for="password-input" class="form-label my-1" style="width:5px;"><b>Password </b></label>
                            <input type="password" id="password-input" class="form-control my-1" name="password">
                            <p id="password-error-msg" style="display: none;" class="text-danger">This field is required</p>

                            <!-- <label for="profike-picture" class="form-label my-1" style="width:5px;"><b>Profile-Picture </b></label>
                            <input type="password" id="password-input" class="form-control my-1" name="password">
                            <p id="password-error-msg" style="display: none;" class="text-danger">This field is required</p> -->

                            <p id="login-error-msg" class="mt-1 text-danger" style="display: block;">
                            <?php 
                                if(isset($_GET['error'])){
                                    echo $_GET['error'];
                                }
                            ?>
                            </p>
                            <div>
                                <button type="submit" name="update" class="login btn btn-success mt-2" id="login-form-submit">Update</button>
                            </div>
                        </div>
                    </fieldset>

<?php
require("../repetitions/footer.php");


$conn = mysqli_connect($servername_db, $username_db, $password_db, $db_name);

$db = mysql_select_db($conn,'db_shoeshop');

if(isset($_POST['update'])){
    
    $query = "UPDATE 'products' SET emri='$_POST[emri]', mbiemri='$_POST[mbiemri]', password='$_POST[password]'";
    $query_run = mysqli_query($conn,$query);

    if($query_run){
        echo "Data updated";
    }else{
        echo "Data not updated";
    }
}

?>

<!--
<div class="row">
                            <div class="col-md-6 offset-3">
                            <form action="">
                            <?php 
                                    $emri = $_SESSION['emri'];
                                    $mbiemri = $_SESSION['mbiemri'];
                                    $email = $_SESSION['email'];
                                    $password = $_SESSION['password'];
                                    $sql = "SELECT * FROM users WHERE emri='$emri' . mbiemri='$mbiemri' . email='$email' . password='$password'";

                                    $gotResult = mysqli_query($conn, $sql);

                                    if($gotResult){
                                        while(mysqli_num_rows($gotResult)>0){
                                            //print_r($row['emri']);
                                            ?>
                                            <div class="form-group">
                                                <input type="text" name="emri" class="form-control" value="<?php echo $row['emri']?>">
                                            </div> 
                                            <div class="form-group">
                                                <input type="text" name="mbiemri" class="form-control" value="<?php echo $row['mbiemri']?>">
                                            </div> 
                                            <div class="form-group">
                                                <input type="text" name="email" class="form-control" value="<?php echo $row['email']?>">
                                            </div> 
                                            <div class="form-group">
                                                <input type="text" name="password" class="form-control" value="<?php echo $row['password']?>">
                                            </div> 
                                            <div class="form-group">
                                                <input type="submit" name="update" class="btn btn-info" value="update" >
                                            </div> 
                                            <?php 
                                        }
                                    }
                                ?>
                                
                            </form>
                            </div>
                            
                        </div> 
 <?php require("includes/repetitions/footer.php"); ?> -->