<?php
require "includes/repetitions/header.php";
require "includes/db/db_manager_connection.php";

if(!isset($_SESSION['username']) && !isset($_SESSION['role'])){
    ?>
    <script>
        window.location.replace('index.php');
    </script>
<?php } else if (!isset($_GET['id'])) { ?>
    <script>
        window.location.replace('products.php');
    </script>
<?php } ?>

<?php 
    $sql = "SELECT * FROM products WHERE id = '".$_GET['id']."'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) === 1)
        $data = mysqli_fetch_assoc($result);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2>Edit Product</h2>
            <form action="update-product.php?id=<?php echo $data['id']; ?>" method="post">

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo $data['name']; ?>">
                </div>

                <div class="form-group">
                    <label for="gender">Gender</label>
                    <select class="form-control" id="gender" name="gender">
                        <option value="Male" <?php if($data['gender'] === 'Male') echo 'selected'; ?>>Male</option>
                        <option value="Female" <?php if($data['gender'] === 'Female') echo 'selected'; ?>>Female</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="size">Size</label>
                    <input type="number" class="form-control" id="size" name="size" value="<?php echo $data['size']; ?>"> 
                </div>

                <div class="form-group">
                    <label for="quantity">Quantity</label>
                    <input type="number" class="form-control" id="quantity" name="quantity" value="<?php echo $data['quantity']; ?>">
                </div>

                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" class="form-control" id="price" name="price" value="<?php echo $data['price']; ?>">
                </div>

                <div>
                    <label for="photo" class="form-label">Choose Photo:</label>
                    <input type="file" class="form-control" id="photo" name="photo"  required>
                </div>

                <br>
                    <button name="update" type="submit" class="btn btn-primary">Update Product</button>
            </form>
        </div>
    </div>
</div>

<?php require "includes/repetitions/footer.php"; ?>