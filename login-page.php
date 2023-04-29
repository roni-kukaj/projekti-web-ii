<?php require("includes/repetitions/header.php"); ?>

    <div class="container mt-5 pt-5">
        <div class="row">
            <div class="col mx-1">
                <img src="assets/images/login.avif" height="400px" width="590px" style="border-radius:20px;" >
            </div>

            <div class="col mx-2">
                <form action="includes/sessions/login.php" method="post" style="align-items: center;" class="my-1" id="login-form">
                    <fieldset>
                        <div class="container">
                            <label class="form-label my-1" for="email-input"><b>Email </b></label>
                            <input type="text" class="form-control my-1" id="email-input" name="email" required>

                            <label for="password-input" class="form-label my-1" style="width:5px;"><b>Password </b></label>
                            <input type="password" id="password-input" class="form-control my-1" name="password" required>

                            <p id="login-error-msg" class="mt-1 text-danger" style="display: block;">
                            <?php 
                                if(isset($_GET['error'])){
                                    echo $_GET['error'];
                                }
                            ?>
                            </p>
                            <div>
                                <button type="submit" class="login btn btn-success mt-2" id="login-form-submit">Log In</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
                <br>
                <p class="mx-4">Don't have an account? You can <a class="link-success" href="signup-page.php">Sign Up</a> instead!</p>
            </div>
        </div>
    </div>
</body>
</html>

    
