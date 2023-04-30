<?php
     require("includes/db/db_connection.php");
     require("includes/repetitions/header.php"); 
    if(!isset($_SESSION['user_name'])){ ?>
        <script>window.location.replace("login-page.php");</script>
    <?php } 
?>


<?php
    $total_price = 0;
    $sql_ = "SELECT product_id FROM cart WHERE user_id=".$_SESSION['id'];
    $result_ = mysqli_query($conn, $sql_);
    $ids = array();
    if(mysqli_num_rows($result_) > 0){
        while($rows_ = mysqli_fetch_assoc($result_)){ $ids[] = $rows_['product_id']; }
        $id_list = "'".implode("', '", $ids)."'";
        $sql = "SELECT * FROM products WHERE id IN ($id_list)";
        $result = mysqli_query($conn, $sql);  
        
?>
<?php
    }
?>


<div class="container my-5">
    <?php while($data = mysqli_fetch_assoc($result)) {?>
    <div class="card my-2">
        <div class="row g-0">
            <div class="col-md-3">
                <img src="<?php echo $data['picture']; ?>" alt="Product image" class="card-img w-75 m-2">
            </div>
            <div class="col-md-9">
                <div class="card-body d-flex flex-column">
                    <h3 class="card-title mt-1"><?php echo $data['name']; ?></h3>
                    <hr>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Gender: <b><?php echo $data['gender']; ?></b></li>
                        <li class="list-group-item">Quantity: <b><?php echo $data['quantity']; ?></b></li>
                        <li class="list-group-item">Size available: <b><?php echo $data['size']; ?></b></li>
                        <li class="list-group-item">Price: <b class="text-success">$<?php echo $data['price']; ?></b></li>
                    </ul>
                    <hr>
                    <div class="d-flex justify-content-end">
                        <a href="includes/sessions/remove-cart-order.php?product_id=<?php echo $data['id'] ?>" class="btn btn-danger">Remove From Order</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $total_price += $data['price'];}?>
</div>
           
        
<div class="container text-center">
    
             <h3 class="text-success mb-5">Total price: $<?php echo $total_price;?></h3>
             <hr>

    <div >
        <a href=""  class="btn btn-success w-25 mx-3 mt-5">Finish Order</a>
    </div>
</div>

<br><br>
<?php require "includes/repetitions/footer.php"; ?>