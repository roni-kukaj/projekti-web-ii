<?php
    include("includes/repetitions/header.php");
    include("includes/db/db_connection.php");
    if(!isset($_SESSION['user_name'])){
    ?>
        <script>
            window.location.replace('index.php');
        </script>
    <?php } 
    if(!isset($_GET['id'])){
        ?>
        <script>
            window.location.replace('profile.php');
        </script>
        <?php
    }
    $total_price = 0;
    $sql = "SELECT * FROM orders_view INNER JOIN products ON orders_view.product_id = products.id WHERE user_id={$_SESSION['id']} AND orders_view.id={$_GET['id']}";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
    ?>
    <div class="container">
    <?php
        while($data = mysqli_fetch_assoc($result)){
    ?>
        
        <div class="row g-0 border m-2 p-2 rounded">
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
                </div>
            </div>
        </div>
        
    <?php
        $total_price += $data['price'];}
    ?>
        <div class="row my-3">
            <h3 class="text-success">Total price: $<?php echo $total_price; ?></h3>
        </div>
    </div>
    <?php
    }
    else {
        ?>
            <h3>Nothing to display!</h3>
        <?php
    }
?>



<?php require("includes/repetitions/footer.php"); ?>