<?php require("includes/repetitions/header.php"); ?>

<html>
<head>
    <title>Log In</title>
</head>
<body>
   
    <br><br>

    div class="container mt-5">
        <div class="row">
            <div class="col mx-1">
                <img src="../assets/images/login.avif" height="468px" width="650px" style="border-radius:20px;" >
            </div>

            <div class="col mx-2">
                <form style="align-items: center;" class="my-1" onsubmit="validateform()" id="login-form">
                    <fieldset>
                        <div class="container">
                            <label class="form-label my-1" for="username"><b>Username  </b></label>
                            <input type="text" class="form-control my-1" id="username">

                            <label for="password" class="form-label my-1" style="width:5px;"><b>Password </b></label>
                            <input type="password" id="password" class="form-control my-1">

                            <p id="login-error-msg" style="opacity:0;">Your username or password is wrong!</p>

                            <div>
                                <button type="submit" class="login btn btn-secondary" id="login-form-submit">Log In</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
          </div>
          </div>
    </div>
<br><br><br><br>
</body>
</html>

    
