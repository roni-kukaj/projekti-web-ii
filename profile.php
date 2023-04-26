<?php
    include("includes/repetitions/header.php"); 
    if(!isset($_SESSION['user_name'])){
?>
<script>
    window.location.replace('index.php');
</script>
<?php } ?>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-5 mx-auto my-4">
            <div class="card ">
                <div class="card-body text-center">
                    <h5 class="card-title">User Profile</h5>
                    <img src="assets/images/user_profile_pictures/person.png" alt="User Profile Image" class="img-fluid rounded-circle mb-3">
                    <p class="card-text"><strong>Name:</strong> <?php echo $_SESSION['user_name']; ?></p>
                    <p class="card-text"><strong>Email:</strong> <?php echo $_SESSION['user_email']; ?> </p>
                    <p class="card-text"><strong>User ID:</strong> <?php echo $_SESSION['id']; ?></p>
                </div>
                <div class="card-footer">
                    <form action="" method="post">
                        <button class="btn btn-success ml-auto">Update Your Information</button>
                    </form>
                    <!-- Qetu ka mu desht me e kriju nje forme per me e bo update user information -->
                    
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

                </div>
            </div>
        </div>
    </div>
</div>
    
<?php require("includes/repetitions/footer.php"); ?>