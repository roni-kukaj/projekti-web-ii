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
                    <img src="<?php echo $_SESSION['profile_picture']; ?>" alt="User Profile Image" class="img-fluid rounded-circle mb-3">
                    <p class="card-text"><strong>Name:</strong> <?php echo $_SESSION['user_name']; ?></p>
                    <p class="card-text"><strong>Last name:</strong> <?php echo $_SESSION['user_lastname']; ?></p>
                    <p class="card-text"><strong>Email:</strong> <?php echo $_SESSION['user_email']; ?> </p>
                    <p class="card-text"><strong>User ID:</strong> <?php echo $_SESSION['id']; ?></p>
                </div>
                <div class="card-footer">
                    <form action="update-page.php?id=<?php echo $_SESSION['id']; ?>" method="post">
                        <button class="btn btn-success ml-auto">Update Your Information</button>
                    </form>
                    <!-- Qetu ka mu desht me e kriju nje forme per me e bo update user information -->

                </div>
            </div>
        </div>
    </div>
</div>
    
<?php require("includes/repetitions/footer.php"); ?>