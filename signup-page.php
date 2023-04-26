<?php require("includes/repetitions/header.php"); ?>

<html>
    <head>
        <title>Sign up</title>
     </head>
    <body>

        <br><br>

        <div class="container mt-5">
        <div class="row">
            <div class="col mx-1">
                <img src="assets/images/signup.avif" alt="Crypto" height="468px" width="600px" style="border-radius:20px;" >
            </div>

            <div class="col mx-2">
                <form  id="signup-form" class="my-1">

                            <label class="form-label my-1" for=""><b>Name</b></label>
                             <input  class="form-control my-1" type="text" class="input"  required>


                            <label class="form-label my-1" for="username"><b>Username</b> </label>
                           <input class="form-control my-1" type="text" class="input"  required>

                            <label class="form-label my-1" for=""><b>Gender:</b></label>

                            <div class="form-check form-check-inline">

                                <input class="butoni form-check-input" type="radio" name="gjinia">
                                <label class="form-check-label" for="">F</label>
                            </div>

                         <div class="form-check form-check-inline my-1">
                         <input class="butoni form-check-input" type="radio" name="gjinia">
                         <label class="form-check-label" for="">M</label>
                        </div>
                         <br>
                            <label class="form-label my-1" for="ID"><b>ID number</b></label>
                             <input class="form-control my-1" type="text"  class="input">

                            <label class="form-label my-1" for="password"><b>Password</b></label>
                             <input class="form-control my-1" name="password" id="password" type="password"  class="input">

                            <label class="form-label my-1" for="confirm"><b>Repeat Password</b></label>
                            <input class="form-control my-1" type="password" name="confirm_password" id="confirm_password" class="input" required>

                            <p id="signup-error-msg" style="opacity:0;">Your passwords don't match.</p>
                        <button type="submit" class="login btn btn-secondary my-1 " id="signup-form-submit">Sign Up</button>

                       <p style="text-align:center; color:black;">Already have an accont? <a href="login-page.php" class="link">Log in</a> now</p>
                    </form>
                </div>
            </div>
        </div>

       </body>
    <br><br><br><br>
</html>

