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
                <li>Emri: <b><?php echo $data['emri']; ?></b></li>
                <li>Mbiemri: <b><?php echo $data['mbiemri']; ?></b></li>
                <li>Email: <b><?php echo $data['emri']; ?></b></li>
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
    <div class="row mt-5">
    <h3>User orders</h3>
	<table class="mt-3">
		<tr>
			<th>User ID</th>
			<th>Product Name</th>
			<th>Quantity</th>
			<th>Price</th>
		</tr>
    </div>
    <?php
    $sql = "SELECT * FROM orders WHERE user_id = '".$_GET['user_id']."'";
    $result = mysqli_query($conn, $sql);
    while($order = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>".$order['user_id']."</td>";
        echo "<td>".$order['product_name']."</td>";
        echo "<td>".$order['quantity']."</td>";
        echo "<td>".$order['price']."</td>";
        echo "</tr>";
    }
?>
</div>


<?php require "includes/repetitions/footer.php"; ?>