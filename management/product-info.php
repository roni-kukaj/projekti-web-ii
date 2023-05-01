<?php
require "includes/repetitions/header.php";
require "includes/db/db_manager_connection.php";
if(!isset($_SESSION['username']) && !isset($_SESSION['role'])){
    ?>
<script>
        window.location.replace('index.php');
</script>
<?php } else if (!isset($_GET['product_id'])) { ?>
    <script>
        window.location.replace('products.php');
    </script>
<?php } ?>

<?php 
    $sql = "SELECT * FROM products WHERE id = '".$_GET['product_id']."'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) === 1)
        $data = mysqli_fetch_assoc($result);
?>

<div class="container">
    <div class="row mt-5">
        <div class="col-md-4">
        <img src="../<?php echo $data['picture'] ?>" alt="User Profile Image" class="img-fluid rounded-circle mb-3">
        </div>
        <div class="col-md-8 d-flex align-items-center">
            <ul class="list-unstyled">
                <li>Name: <b><?php echo $data['name']; ?></b></li>
                <li>Gender: <b><?php echo $data['gender']; ?></b></li>
                <li>Size: <b><?php echo $data['size']; ?></b></li>
                <li>Quantity: <b><?php echo $data['quantity']; ?></b></li>
                <li>Price: <b><?php echo $data['price']; ?></b></li>
                <li>Picture: <?php echo $data['picture'] ?></li>
            </ul>
        </div>
    </div>
    
    <div class="row w-25">
    <div class="col">
        <button class="btn btn-danger" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">Delete Product</button>
    </div>

    <div class="col">
        <form action="edit-product.php?id=<?php echo $data['id']; ?>" method="post" class="mt-1">
            <button href="#collapseExample1" class="btn btn-primary me-2">Edit Product</button>
        </form>    
    </div>
        </form>
    </div>

    <div class="collapse mt-3 border p-3 rounded" id="collapseExample">
        Are you sure you want to delete this product?
        <br><br>
        <form action="delete-product.php?id=<?php echo $data['id']; ?>" method="post" class="mt-1">
            <button type="button" class="btn btn-secondary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">Cancel</button>
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>
    <p class="text-danger">
        <?php
            if(isset($_GET['error']))
                echo $_GET['error'];
        ?>
    </p>
</div>
        </p>
    </div>
</div>


<?php require "includes/repetitions/footer.php"; ?>