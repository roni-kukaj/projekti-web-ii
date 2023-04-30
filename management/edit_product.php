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
                        <option value="M" <?php if($data['gender'] === 'M') echo 'selected'; ?>>Male</option>
                        <option value="F" <?php if($data['gender'] === 'F') echo 'selected'; ?>>Female</option>
                        <option value="U" <?php if($data['gender'] === 'U') echo 'selected'; ?>>Unisex</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="size">Size</label>
                    <select class="form-control" id="size" name="size">
                        <option value="S" <?php if($data['size'] === 'S') echo 'selected'; ?>>Small</option>
                        <option value="M" <?php if($data['size'] === 'M') echo 'selected'; ?>>Medium</option>
                        <option value="L" <?php if($data['size'] === 'L') echo 'selected'; ?>>Large</option>
                        <option value="XL" <?php if($data['size'] === 'XL') echo 'selected'; ?>>Extra Large</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="quantity">Quantity</label>
                    <input type="number" class="form-control" id="quantity" name="quantity" value="<?php echo $data['quantity']; ?>">
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" class="form-control" id="price" name="price" value="<?php echo $data['price']; ?>">
                </div>
                <button type="submit" class="btn btn-primary">Update Product</button>
            </form>
        </div>
    </div>
</div>

<?php require "includes/repetitions/footer.php"; ?>