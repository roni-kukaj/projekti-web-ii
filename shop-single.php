<?php
require("includes/repetitions/header.php"); 
require("includes/db/db_connection.php");

if(!isset($_SESSION['user_name'])){ ?>
   <script>window.location.replace("login-page.php");</script>
<?php }

$sql = "SELECT * FROM products WHERE id=".$_GET['product_id'];
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) === 1){
    $data = mysqli_fetch_assoc($result);
}
?>
<div class="container my-5">
    <div class="card">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="<?php echo $data['picture']; ?>" alt="Product image" class="card-img w-75 m-2">
            </div>
            <div class="col-md-8">
                <div class="card-body d-flex flex-column">
                    <h3 class="card-title mt-1"><?php echo $data['name']; ?></h3>
                    <hr>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Gender: <b><?php echo $data['gender']; ?></b></li>
                        <li class="list-group-item">Quantity: <b><?php echo $data['quantity']; ?></b></li>
                        <li class="list-group-item">Size available: <b><?php echo $data['size']; ?></b></li>
                    </ul>
                    <hr>
                    <div class="d-flex flex-start">
                        <a href="shop.php" class="btn btn-secondary w-25 mr-3">Cancel</a>
                        <a href="" class="btn btn-success w-25 mx-3">Order Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
<?php require("includes/repetitions/footer.php"); ?>