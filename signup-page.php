<?php require("includes/repetitions/header.php"); ?>

<html>
    <head>
        <title>Sign up</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="stylesheet" href="../style/login&signup.css">
        <link rel="stylesheet" href="../style/about_us.css">
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <a class="navbar-brand mx-2" href="home.html">
                        <img src="../images/small_logo.png" alt="Logo" height="40px" width="45px" class="rounded">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse menu-drop" id="navbarNavDropdown">
                        <ul class="navbar-nav me-auto">
                            <li class="nav-item">
                                <a class="nav-link active link-light" aria-current="page" href="home.html">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link link-light" href="crypto.html">Crypto</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle link-light" href="about_us.html" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    About Us
                                </a>

                                <ul class="dropdown-menu" style="background-color:#243945; ">
                                    <li><a class="dropdown-item" href="about_us.html">About</a></li>
                                    <li><a class="dropdown-item" href="basicinfo.html">Basic Informations</a></li>
                                    <li><a class="dropdown-item" href="gallery.html">Gallery</a></li>
                                    <li><a class="dropdown-item" href="employment.html">Employment</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link link-light" href="contact_us.html">Contact Us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link link-light" href="help.html">Help</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link link-light" href="account.html" style="visibility:hidden;">Account</a>
                            </li>
                        </ul>
                        <div class="">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a href="login.html" class="nav-link link-light">Log In</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
        <br><br>







      <div class="container mt-5">
        <div class="row">
            <div class="col mx-1">
                <img src="../images/crypto-banks.jpeg" alt="Crypto" height="468px" width="650px" style="border-radius:20px;" >
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
                        <p>By pressing Sign Up you agree to our <a href="privacy_policy.html" class="link">Terms and Conditions</a></p>
                        <button type="submit" class="login btn btn-secondary my-1 " id="signup-form-submit">Sign Up</button>

                       <p style="text-align:center; color:black;">Already have an accont? <a href="login.html" class="link">Log in</a> now</p>
                    </form>
                </div>
            </div>
        </div>

        <script type="text/javascript" src="../scripts/signup.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>
</html>

    
<?php require("includes/repetitions/footer.php"); ?>