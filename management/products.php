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
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Gender</th>
                <th>Size</th>
                <th>Quantity</th>
                <th>Price</th>
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
                
                </tr>
            <?php } ?>

   
        <p>
    <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">Add Product</a>
    <input type="hidden" name="id" value="1"> 
  <a class="btn btn-primary" type="delete" name="delete">Delete</a>
</p>

<div class="collapse" id="collapseExample">
    <div class="card card-body">
        <form method="post" action="add_products.php" enctype="multipart/form-data">

            <div class="mb-3">
                <label for="name" class="form-label" width="20px">Name:</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="gender" class="form-label">Gender:</label>
                <select id="gender" name="gender" class="form-select"  required>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="size" class="form-label">Size:</label>
                <input type="text" id="size" name="size" class="form-control"  required>
            </div>
            <div class="mb-3">
                <label for="quantity" class="form-label">Quantity:</label>
                <input type="number" id="quantity" name="quantity" class="form-control"  required>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price:</label>
                <input type="number" id="price" name="price" step="0.01" class="form-control"  required>
            </div>

           
  <div class="mb-3">
    <label for="photo" class="form-label">Choose Photo:</label>
    <input type="file" class="form-control" id="photo" name="photo"  required>
  </div>

            <button name="submit" type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</div>
  </body>
</html>
        </tbody>
    </table>
</div>


<?php require "includes/repetitions/footer.php"; ?>                                                                                                                      