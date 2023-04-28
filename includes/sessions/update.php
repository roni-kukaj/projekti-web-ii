 <?php
    include("../repetitions/header.php"); 
    if(!isset($_SESSION['user_name']))
?>

                    <fieldset>
                        <div class="container">
                            <label class="form-label my-1" for="email-input"><b>Email </b></label>
                            <input type="text" class="form-control my-1" id="email-input" name="email">
                            <p id="email-error-msg" style="display: none;" class="text-danger">This field is required</p>

                            <label for="password-input" class="form-label my-1" style="width:5px;"><b>Password </b></label>
                            <input type="password" id="password-input" class="form-control my-1" name="password">
                            <p id="password-error-msg" style="display: none;" class="text-danger">This field is required</p>

                            <!-- <label for="profike-picture" class="form-label my-1" style="width:5px;"><b>Profile-Picture </b></label>
                            <input type="password" id="password-input" class="form-control my-1" name="password">
                            <p id="password-error-msg" style="display: none;" class="text-danger">This field is required</p> -->

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

<?php

require("includes/repetitions/footer.php");

?>

<!--
<div class="row">
                            <div class="col-md-6 offset-3">
                            <form action="">
                            <?php 
                                    $emri = $_SESSION['emri'];
                                    $mbiemri = $_SESSION['mbiemri'];
                                    $email = $_SESSION['email'];
                                    $password = $_SESSION['password'];
                                    $sql = "SELECT * FROM users WHERE emri='$emri' . mbiemri='$mbiemri' . email='$email' . password='$password'";

                                    $gotResult = mysqli_query($conn, $sql);

                                    if($gotResult){
                                        while(mysqli_num_rows($gotResult)>0){
                                            //print_r($row['emri']);
                                            ?>
                                            <div class="form-group">
                                                <input type="text" name="emri" class="form-control" value="<?php echo $row['emri']?>">
                                            </div> 
                                            <div class="form-group">
                                                <input type="text" name="mbiemri" class="form-control" value="<?php echo $row['mbiemri']?>">
                                            </div> 
                                            <div class="form-group">
                                                <input type="text" name="email" class="form-control" value="<?php echo $row['email']?>">
                                            </div> 
                                            <div class="form-group">
                                                <input type="text" name="password" class="form-control" value="<?php echo $row['password']?>">
                                            </div> 
                                            <div class="form-group">
                                                <input type="submit" name="update" class="btn btn-info" value="update" >
                                            </div> 
                                            <?php 
                                        }
                                    }
                                ?>
                                
                            </form>
                            </div>
                            
                        </div> 
 <?php require("includes/repetitions/footer.php"); ?> -->