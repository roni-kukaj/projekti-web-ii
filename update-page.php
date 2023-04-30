<?php
    include("includes/repetitions/header.php"); 
    if(!isset($_SESSION['user_name'])){
 ?>
<script>
 window.location.replace('index.php');
</script>
<?php } ?>

<?php
require("includes/db/db_connection.php");

$sql = "SELECT * FROM users WHERE id = '".$_SESSION['id']."'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) === 1)
        $data = mysqli_fetch_assoc($result);
?>
<div class="container m-5">
    <form action="includes/sessions/update.php" method="POST" class="row" enctype="multipart/form-data">
        <div class="col-md-4 d-flex align-items-center justify-content-center">
            <img src="<?php echo $data['profile_picture']; ?>" alt="Profile Picture" class="img w-50">
        </div>
        <div class="col-md-8">
            <label class="form-label my-1" for="emri-input"><b>Emri </b></label>
            <input type="text" class="form-control my-1" id="emri" name="emri" value="<?php echo $data['emri']; ?>">
            <p class="text-danger"><?php if(isset($_GET['emri_error'])) echo $_GET['emri_error']; ?></p>

            <label class="form-label my-1" for="mbiemri-input"><b>Mbiemri </b></label>
            <input type="text" class="form-control my-1" id="mbiemri" name="mbiemri" value="<?php echo $data['mbiemri']; ?>">
            <p class="text-danger"><?php if(isset($_GET['mbiemri_error'])) echo $_GET['mbiemri_error']; ?></p>            
                     
            <label for="password-input" class="form-label my-1" style=""><b>Old Password </b></label>
            <input type="password" id="password" class="form-control my-1" name="oldpassword">
            <p class="text-danger"><?php if(isset($_GET['oldpassword_error'])) echo $_GET['oldpassword_error']; ?></p>

            <label for="password-input" class="form-label my-1" style=""><b>New Password </b></label>
            <input type="password" id="password" class="form-control my-1" name="password">
            <p class="text-danger"><?php if(isset($_GET['password_error'])) echo $_GET['password_error']; ?></p>

            <label for="confirm-password-input" class="form-label my-1" style=""><b>Confirm Password </b></label>
            <input type="password" id="confirm-password" class="form-control my-1" name="confirmpassword">
            <p class="text-danger"><?php if(isset($_GET['confirmpassword_error'])) echo $_GET['confirmpassword_error']; ?></p>            
                           
            <label for="profile-picture-input" class="form-label my-1"><b>Profile Picture</b></label>
            <input type="file" name="profilepicture" class="form-control">
            <p class="text-danger"><?php if(isset($_GET['profilepicture_error'])) echo $_GET['profilepicture_error']; ?></p>


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
    </form>
</div> 


 <?php require("includes/repetitions/footer.php"); ?>