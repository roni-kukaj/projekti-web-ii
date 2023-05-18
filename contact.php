
<?php
    require("includes/repetitions/header.php");
?>
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
        
    <div class="container my-3">
        <div class="alert alert-success alert-dismissible fade show" id="success-alert" role="alert" style="display: none">
            Your question was received! It will be answered soon! Thank you very much for contacting us!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <div class="alert alert-danger alert-dismissible fade show" id="failed-alert" role="alert" style="display: none">
            Your question could not be sent! Please try again later!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    <!-- Start Contact -->
    <div class="container py-5">
        <div class="row py-5">
            <form class="col-md-9 m-auto" id="contact-form">
                <h2>Ask us anything?</h2>
                <hr>
                <div class="row">
                    <div class="form-group col-md-6 mb-3">
                        <label for="inputname">Name</label>
                        <input type="text" class="form-control mt-1" id="name" name="firstname" placeholder="Name" required>
                        <p class="text-danger" id="name-error"><?php if(isset($_GET['firstname_error'])) echo $_GET['firstname_error']; ?></p>
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <label for="inputemail">Email</label>
                        <input type="email" class="form-control mt-1" id="email" name="email" placeholder="Email" required>
                        <p class="text-danger" id="email-error"><?php if(isset($_GET['email_error'])) echo $_GET['email_error']; ?></p>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="inputsubject">Subject</label>
                    <input type="text" class="form-control mt-1" id="subject" name="subject" placeholder="Subject" required>
                    <p class="text-danger" id="subject-error"><?php if(isset($_GET['subject_error'])) echo $_GET['subject_error']; ?></p>
                </div>
                <div class="mb-3">
                    <label for="inputmessage">Message</label>
                    <textarea class="form-control mt-1" id="message" name="message" placeholder="Message" rows="8" required></textarea>
                    <p class="text-danger" id="message-error"><?php if(isset($_GET['message_error'])) echo $_GET['message_error']; ?></p>
                </div>
                <div class="row">
                    <div class="col text-end mt-2">
                        <button id="submit" type="button" onclick="makeRequest()" class="btn btn-success btn-lg px-3" name="contact">Let's Talk</button>
                        <br>
                        <div id="success"></div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
        function makeRequest(){
            validateForm();
            var request = new XMLHttpRequest();
            request.open("POST", "contact-faq.php", true);
            request.onreadystatechange = function(){
                if(this.readyState === 4 && this.status === 200) {
                    document.getElementById("success-alert").style.display = 'block';
                    document.getElementById("name").value = '';
                    document.getElementById("email").value = '';
                    document.getElementById("subject").value = '';
                    document.getElementById("message").value = '';
                }
            }
            var myForm = document.getElementById("contact-form");
            var formData = new FormData(myForm);
            request.send(formData);
        }
        function validateForm(){
            var name = document.getElementById("name").value;
            var email = document.getElementById("email").value;
            var subject = document.getElementById("subject").value;
            var message = document.getElementById("message").value;
            if(name.length < 2 || name.length > 30){
                document.getElementById("name-error").innerHTML = "Invalid name!";
            }
            if(message.length > 500){
                document.getElementById("message-error").innerHTML = "Message cannot be longer than 500 chars!";
            }
        }
    </script>

<?php

    require("includes/repetitions/footer.php");

?>