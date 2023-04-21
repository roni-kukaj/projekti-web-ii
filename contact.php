
<?php
    require("includes/repetitions/header.php");
?>
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
              <form action="" method="">
                <div class="mb-3">
                    <label for="email-input" class="form-label">Email address</label>
                    <input type="email" class="form-control border" id="email-input" placeholder="name@example.com">
                </div>
                <div class="mb-3">
                    <label for="password-input" class="form-label">Password</label>
                    <input type="password" class="form-control border" id="password-input" placeholder="###">
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

    <!-- Start Content Page -->
    <div class="container-fluid bg-light py-5">
        <div class="col-md-6 m-auto text-center">
            <h1 class="h1">Contact Us</h1>
        </div>
    </div>

   

    <!-- Start Map -->
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d727.6868682172372!2d21.16765345287343!3d42.64923180444831!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x13549ec1b6ecb2c1%3A0x7f0893730efce187!2sFakulteti%20Teknik!5e0!3m2!1sen!2s!4v1680563107720!5m2!1sen!2s" 
    width="100%" height="400" style="border:0;" allowfullscreen="false" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    <!-- End Map -->
    <!-- Start Contact -->
    <div class="container py-5">
        <div class="row py-5">
            <form class="col-md-9 m-auto" method="post" role="form">
                <div class="row">
                    <div class="form-group col-md-6 mb-3">
                        <label for="inputname">Name</label>
                        <input type="text" class="form-control mt-1" id="name" name="name" placeholder="Name">
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <label for="inputemail">Email</label>
                        <input type="email" class="form-control mt-1" id="email" name="email" placeholder="Email">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="inputsubject">Subject</label>
                    <input type="text" class="form-control mt-1" id="subject" name="subject" placeholder="Subject">
                </div>
                <div class="mb-3">
                    <label for="inputmessage">Message</label>
                    <textarea class="form-control mt-1" id="message" name="message" placeholder="Message" rows="8"></textarea>
                </div>
                <div class="row">
                    <div class="col text-end mt-2">
                        <button type="submit" class="btn btn-success btn-lg px-3">Let's Talk</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <?php

    require("includes/repetitions/footer.php");

?>