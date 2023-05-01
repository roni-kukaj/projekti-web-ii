<?php
require "includes/repetitions/header.php";
require "includes/db/db_manager_connection.php";
if(!isset($_SESSION['username']) && !isset($_SESSION['role'])){
?>
    <script>
            window.location.replace('index.php');
    </script>
<?php } ?>
<?php
    $sql = "SELECT id, name, gender, size, quantity, price FROM products";
    $result = mysqli_query($conn, $sql);
?>

<div class="container">
    <h2 class="text-center my-5">Products Table</h2>

    <p>
        <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">Add Product</a>
        <input type="hidden" name="id" value="1">       
    </p>

        <div class="collapse my-2 <?php if(!empty($_GET)) echo "show"; ?>" id="collapseExample">
            <div class="card card-body">
                <form method="post" action="add-products.php" enctype="multipart/form-data">

                    <div class="mb-3">
                        <label for="name" class="form-label" width="20px">Name:</label>
                        <input type="text" id="name" name="name" class="form-control" required>
                        <p class="text-danger"><?php if(isset($_GET['name_error'])) echo $_GET['name_error']; ?></p>
                    </div>
                    
                    <div class="mb-3">
                        <label for="gender" class="form-label">Gender:</label>
                        <select id="gender" name="gender" class="form-select"  required>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                        <p class="text-danger"><?php if(isset($_GET['gender_error'])) echo $_GET['gender_error']; ?></p>

                    </div>

                    <div class="mb-3">
                        <label for="size" class="form-label">Size:</label>
                        <input type="number" id="size" name="size" class="form-control"  required>
                        <p class="text-danger"><?php if(isset($_GET['size_error'])) echo $_GET['size_error']; ?></p>
                    </div>

                    <div class="mb-3">
                        <label for="quantity" class="form-label">Quantity:</label>
                        <input type="number" id="quantity" name="quantity" class="form-control"  required>
                        <p class="text-danger"><?php if(isset($_GET['quantity_error'])) echo $_GET['quantity_error']; ?></p>
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label">Price:</label>
                        <input type="number" id="price" name="price" step="0.01" class="form-control"  required>
                        <p class="text-danger"><?php if(isset($_GET['price_error'])) echo $_GET['price_error']; ?></p>
                    </div>

                
                    <div class="mb-3">
                        <label for="photo" class="form-label">Choose Photo:</label>
                        <input type="file" class="form-control" id="photo" name="photo"  required>
                    </div>
                    <p class="text-danger"><?php if(isset($_GET['photo_error'])) echo $_GET['photo_error']; ?></p>


                    <button name="submit" type="submit" class="btn btn-primary w-25">Save</button>
                    <p class="text-danger"><?php if(isset($_GET['error'])) echo $_GET['error']; ?></p>
                </form>
            </div>
        </div>

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Gender</th>
                <th>Size</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = mysqli_fetch_assoc($result)){ ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['gender']; ?></td>
                    <td><?php echo $row['size']; ?></td>
                    <td><?php echo $row['quantity']; ?></td>
                    <td><?php echo $row['price']; ?></td>
                    <td>
                        <!-- <button type="submit" class="btn btn-link">More...</button> -->
                        <a href="product-info.php?product_id=<?php echo $row['id'];?>" class="btn btn-link">More...</a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
    </table>
      
</div>


<?php require "includes/repetitions/footer.php"; ?>                                                                                                                      