<?php
    include("includes/repetitions/header.php"); 
?>
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
                </div>
            </div>
        </div>
    </div>
</div>
    
<?php require("includes/repetitions/footer.php"); ?>