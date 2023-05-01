<?php require("includes/repetitions/header.php"); 

if(isset($_SESSION['role'])){
    ?>
        <script>window.location.replace("management/dashboard.php");</script>
    <?php
}
?>

<div class="container my-5">
    <div class="row">
        <div class="col-md-5 d-flex align-items-center">
            <img src="assets/images/signup.png" alt="Crypto" class="img w-100">
        </div>
        <div class="col-md-7">
            <form  id="signup-form" class="my-1" action="includes/sessions/signup.php" method="POST">

                <label class="form-label my-1" for=""><b>Firstname</b></label>
                <input  class="form-control my-1" type="text" class="input" name="firstname" required>
                <p class="text-danger"><?php if(isset($_GET['firstname_error'])) echo $_GET['firstname_error']; ?></p>

                <label class="form-label my-1" for="username"><b>Lastname</b> </label>
                <input class="form-control my-1" type="text" class="input" name="lastname" required>
                <p class="text-danger"><?php if(isset($_GET['lastname_error'])) echo $_GET['lastname_error']; ?></p>

                <label class="form-label my-1" for="email"><b>Email</b></label>
                <input class="form-control my-1" type="text" name="email" class="input" required>
                <p class="text-danger"><?php if(isset($_GET['email_error'])) echo $_GET['email_error']; ?></p>

                <label class="form-label my-1" for="password"><b>Password</b></label>
                <input class="form-control my-1" name="password" id="password" type="password"  class="input" required>
                <p class="text-danger"><?php if(isset($_GET['password_error'])) echo $_GET['password_error']; ?></p>
                
                <label class="form-label my-1" for="confirm"><b>Confirm Password</b></label>
                <input class="form-control my-1" type="password" name="confirmpassword" id="confirmpassword" class="input" required>
                <p class="text-danger"><?php if(isset($_GET['confirmpassword_error'])) echo $_GET['confirmpassword_error']; ?></p>
               
                <p id="login-error-msg" class="mt-1 text-danger" style="display: block;">
                <?php 
                    if(isset($_GET['error'])){
                        echo $_GET['error'];
                    }
                ?>
                </p>
                <button type="submit" class="login btn btn-success my-1 " id="signup-form-submit">Sign Up</button>
                <br><br>
                <p>Already have an account? <a href="login-page.php" class="link-success">Log in</a> now!</p>
            </form>
        </div>
    </div>
</div>

<?php require "includes/repetitions/footer.php"; ?>
