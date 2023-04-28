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
                    <td>
                        <!-- <button type="submit" class="btn btn-link">More...</button> -->
                        <a href="product-info.php?product_id=<?php echo $row['id'];?>" class="btn btn-link">m</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>


<?php require "includes/repetitions/footer.php"; ?>