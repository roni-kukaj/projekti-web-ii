<?php
    include("../repetitions/header.php"); 
    if(!isset($_SESSION['user_name'])){
 ?>
<script>
 window.location.replace('index.php');
</script>
<?php } ?>

<link rel="apple-touch-icon" href="../../assets/images/apple-icon.png">
<link rel="shortcut icon" type="image/x-icon" href="../../assets/images/shoe-favicon.png">

<link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
<link rel="stylesheet" href="../../assets/css/templatemo.css">
<link rel="stylesheet" href="../../assets/css/custom.css">
<link rel="stylesheet" href="../../assets/css/index.css">

    <!-- Load fonts style after rendering the layout styles -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
<link rel="stylesheet" href="../../assets/css/fontawesome.min.css"> 
 



<?php 
require("../db/db_connection.php");


    $sql = "SELECT * FROM users WHERE emri = '".$_GET['emri']."', mbiemri = '".$_GET['mbiemri']."', password = '".$_GET['password']."'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) === 1)
        $data = mysqli_fetch_assoc($result);
?>

                    <fieldset>
                        <div class="container">
                            <label class="form-label my-1" for="emri-input" ><b>Emri </b></label>
                            <input type="text" class="form-control my-1" id="emri" name="emri" value="<?php echo $data['emri']; ?>">
                            

                            <label class="form-label my-1" for="mbiemri-input"><b>Mbiemri </b></label>
                            <input type="text" class="form-control my-1" id="mbiemri" name="mbiemri" value="<?php echo $data['mbiemri']; ?>">
                           

                            <label for="password-input" class="form-label my-1" style="width:5px;"><b>Password </b></label>
                            <input type="password" id="password-input" class="form-control my-1" name="password" value="<?php echo $data['password']; ?>">
                           

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
</div> 
<?php
require("../db/db_connection.php");

if(isset($_POST['update'])){
    
    $query = "UPDATE 'products' SET emri='".$_POST[emri]."', mbiemri='".$_POST[mbiemri]."', password='".$_POST[password]."'";

    $query_run = mysqli_query($conn,$query);

    if($query_run){
        echo "Data updated";
    }else{
        echo "Data not updated";
    }
}


?>

 <?php require("../repetitions/footer.php"); ?>