<?php
require "includes/repetitions/header.php";
require "includes/db/db_manager_connection.php";
if(!isset($_SESSION['username']) && !isset($_SESSION['role'])){
    ?>
<script>
        window.location.replace('index.php');
</script>
<?php } else if (!isset($_GET['user_id'])) { ?>
    <script>
        window.location.replace('users.php');
    </script>
<?php } ?>

<?php 
    $sql = "SELECT * FROM users WHERE id = '".$_GET['user_id']."'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) === 1)
        $data = mysqli_fetch_assoc($result);
?>

<div class="container">
    <div class="row mt-5">
        <div class="col-md-4">
        <img src="../<?php echo $data['profile_picture'] ?>" alt="User Profile Image" class="img-fluid rounded-circle mb-3">
        </div>
        <div class="col-md-8 d-flex align-items-center">
            <ul class="list-unstyled">
                <li>Id: <b><?php echo $data['id']; ?></b></li>
                <li>Emri: <b><?php echo $data['emri']; ?></b></li>
                <li>Mbiemri: <b><?php echo $data['mbiemri']; ?></b></li>
                <li>Email: <b><?php echo $data['email']; ?></b></li>
            </ul>
        </div>
    </div>
    <div class="row w-25">
        <button class="btn btn-danger" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">Delete User</button>
        <div class="collapse mt-3 border p-3 rounded" id="collapseExample">
            Are you sure you want to delete this user?
            <br><br>
            <form action="delete-user.php?id=<?php echo $data['id']; ?>" method="post" class="mt-1">
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
    <div class="row my-5">
        <h3>User orders</h3>
        <table class="mt-3">
            <tr>
                <th>ID</th>
                <th>User ID</th>
                <th>Order Date</th>
                <th>Arrival Date</th>
                <th>Address</th>
                <th>Action</th>
            </tr>
        </div>
        <?php
            $sql = "SELECT * FROM orders_view WHERE user_id = '".$_GET['user_id']."' GROUP BY id";
            $result = mysqli_query($conn, $sql);
                
            if(mysqli_num_rows($result) > 0) {
                while($orders = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>".$orders['id']."</td>";
                    echo "<td>".$orders['user_id']."</td>";
                    echo "<td>".$orders['order_date']."</td>";
                    echo "<td>".$orders['arrival_date']."</td>";
                    echo "<td>".$orders['address']."</td>";
                    echo "<td><a href=\"order-details.php?id={$orders['id']}\">View products...</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "No orders found for this user.";
            }
        ?>
    </div>
</div>

<?php require "includes/repetitions/footer.php"; ?>