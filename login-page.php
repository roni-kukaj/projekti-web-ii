<?php require("includes/repetitions/header.php"); ?>

<html>
<head>
    <title>Log In</title>
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
                            <ul class="dropdown-menu" style="background-color:#243945;">
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
                                <a href="signup.html" class="nav-link link-light">Sign Up</a>
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
            <div class="col-xl-6">
                <img src="../images/login.jfif" alt="" style="border-radius:20px;" width="100%">
            </div>

            <div class="col-xl-6">
                <form class="my-1" onsubmit="validateform()" id="login-form">
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


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script type="text/javascript" src="../scripts/login.js">

</script>
</body>
</html>

    
<?php require("includes/repetitions/footer.php"); ?>