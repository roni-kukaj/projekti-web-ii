<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>shoeshop</title>
    <link rel="apple-touch-icon" href="assets/images/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/shoe-favicon.png">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel="stylesheet" href="assets/css/index.css">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
</head>
<body>

       <!-- Start Top Nav -->
       <nav class="navbar navbar-expand-lg bg-dark navbar-light d-none d-lg-block" id="templatemo_nav_top">
        <div class="container text-light">
            <div class="w-100 d-flex justify-content-between">
                <div>
                    <i class="fa fa-envelope mx-2"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none" href="mailto:info@company.com">info@shoeshop.com</a>
                    <i class="fa fa-phone mx-2"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none" href="tel:010-020-0340">049/123-4567</a>
                </div>
                <div>
                    <a class="text-light" href="https://fb.com/" target="_blank" rel="sponsored"><i class="fab fa-facebook-f fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://twitter.com/" target="_blank"><i class="fab fa-twitter fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://www.linkedin.com/" target="_blank"><i class="fab fa-linkedin fa-sm fa-fw"></i></a>
                </div>
            </div>
        </div>
    </nav>
    <!-- Close Top Nav -->


    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light shadow">
        <div class="container d-flex justify-content-between align-items-center">

            <a class="navbar-brand text-success logo h1 align-self-center" href="<?php echo 'index.php'; ?>">
                <i>shoeshop</i>
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
                <div class="flex-fill">
                    <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo 'index.php'; ?>">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo 'about.php'; ?>">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo 'shop.php'; ?>">Shop</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo 'contact.php'; ?>">Contact</a>
                        </li>
                    </ul>
                </div>
                <div class="navbar align-self-center d-flex">
                    <div class="d-lg-none flex-sm-fill mt-3 mb-4 col-7 col-sm-auto pr-3">
                        <div class="input-group">
                            <input type="text" class="form-control" id="inputMobileSearch" placeholder="Search ...">
                            <div class="input-group-text">
                                <i class="fa fa-fw fa-search"></i>
                            </div>
                        </div>
                    </div>
                    <a class="nav-icon d-none d-lg-inline" href="#" data-bs-toggle="modal" data-bs-target="#templatemo_search">
                        <i class="fa fa-fw fa-search text-dark mr-2"></i>
                    </a>
                    <a class="nav-icon position-relative text-decoration-none" href="products.html">
                        <i class="fa fa-fw fa-cart-arrow-down text-dark mr-1"></i>
                    </a>
                    <button class="btn nav-icon position-relative" data-bs-toggle="modal" data-bs-target="#login-modal">
                        <i class="fa fa-fw fa-user text-dark mr-3"></i>
                    </button>
                </div>
            </div>
        </div>
    </nav>
    <!-- End of Header -->
    
    <!-- Modal -->
    <div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="w-100 pt-1 mb-5 text-right">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="get" class="modal-content modal-body border-0 p-0">
                <div class="input-group mb-2">
                    <input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="Search ...">
                    <button type="submit" class="input-group-text bg-success text-light">
                        <i class="fa fa-fw fa-search text-white"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Login Modal -->
    <div class="modal fade" id="login-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header justify-content-center bg-light">
              <h1 class="modal-title fs-5" id="staticBackdropLabel">Log In</h1>
            </div>

            <div class="modal-body">
                <form action="../sessions/login.php" method="post">
                    <?php if(isset($_GET['error'])) { ?>
                        <p class="text-danger"><?php echo $_GET['error']; ?></p>
                    <?php } ?>
                    <div class="mb-3">
                        <label for="email-input" class="form-label">Email address</label>
                        <input type="email" class="form-control border" id="email-input" name="email-input" placeholder="name@example.com">
                    </div>
                    <div class="mb-3">
                        <label for="password-input" class="form-label">Password</label>
                        <input type="password" class="form-control border" id="password-input" name="password-input" placeholder="###">
                    </div>
                </form>
                <p>Don't have an account? <a class="text-decoration-none text-success" data-bs-toggle="modal" data-bs-target="#signup-modal" data-bs-dismiss="modal" href=""><b>Sign Up</b></a> instead</p>
            </div>

            <div class="modal-footer bg-light">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-success">Log In</button>
            </div>
          </div>
        </div>
    </div>

    <!-- Signup modal -->
    <div class="modal fade" id="signup-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header justify-content-center bg-light">
              <h1 class="modal-title fs-5" id="staticBackdropLabel">Sign Up</h1>
            </div>

            <div class="modal-body">
              <form action="" method="">
                <div class="mb-3">
                    <label for="name-input" class="form-label">First Name</label>
                    <input type="text" class="form-control border" id="name-input" placeholder="John">
                </div>
                <div class="mb-3">
                    <label for="lastname-input" class="form-label">Last Name</label>
                    <input type="text" class="form-control border" id="lastname-input" placeholder="Smith">
                </div>
                <div class="mb-3">
                    <label for="email-input" class="form-label">Email Address</label>
                    <input type="email" class="form-control border" id="email-input" placeholder="name@example.com">
                </div>
                <div class="mb-3">
                    <label for="confirm-email-input" class="form-label">Confirm Email Address</label>
                    <input type="email" class="form-control border" id="confirm-email-input" placeholder="name@example.com">
                </div>
                <div class="mb-3">
                    <label for="password-input" class="form-label">Password</label>
                    <input type="password" class="form-control border" id="password-input" placeholder="###">
                </div>
                <div class="mb-3">
                    <label for="confirm-password-input" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control border" id="confirm-password-input" placeholder="###">
                </div>
              </form>
              <hr>
              <p>Already have an account? <a class="text-decoration-none text-success" data-bs-toggle="modal" data-bs-target="#login-modal" data-bs-dismiss="modal" href=""><b>Log In</b></a> here</p>
            </div>

            <div class="modal-footer bg-light">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-success">Sign Up</button>
            </div>
          </div>
        </div>
    </div>

       <!-- Start Script -->
    <script src="assets/js/jquery-1.11.0.min.js"></script>
    <script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/templatemo.js"></script>
    <script src="assets/js/custom.js"></script>
    <script>
        const myModal = document.getElementById('myModal')
        const myInput = document.getElementById('myInput')

        myModal.addEventListener('shown.bs.modal', () => {
            myInput.focus()
        })
    </script>
    <!-- End Script -->
    
