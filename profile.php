<?php
    include("includes/repetitions/header.php");
    include("includes/db/db_connection.php");
    if(!isset($_SESSION['user_name'])){
?>
<script>
    window.location.replace('index.php');
</script>
<?php } 
if(isset($_SESSION['role'])){
    ?>
        <script>window.location.replace("management/dashboard.php");</script>
    <?php
}
?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-5 mx-auto my-4">
            <div class="card ">
                <div class="card-body text-center">
                    <h5 class="card-title">User Profile</h5>
                    <img src="<?php echo $_SESSION['profile_picture']; ?>" alt="User Profile Image" class="img-fluid rounded-circle mb-3">
                    <p class="card-text"><strong>Name:</strong> <?php echo $_SESSION['user_name']; ?></p>
                    <p class="card-text"><strong>Last name:</strong> <?php echo $_SESSION['user_lastname']; ?></p>
                    <p class="card-text"><strong>Email:</strong> <?php echo $_SESSION['user_email']; ?> </p>
                    <p class="card-text"><strong>User ID:</strong> <?php echo $_SESSION['id']; ?></p>
                </div>
                <div class="card-footer">
                    <form action="update-page.php?id=<?php echo $_SESSION['id']; ?>" method="post">
                        <button class="btn btn-success ml-auto">Update Your Information</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <?php
            $sql = "SELECT * FROM orders_view WHERE user_id={$_SESSION['id']} GROUP BY id";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) > 0){
        ?>
            <table class="table table-striped">
                <thead>
                    <th>Id</th>
                    <th>Order Date</th>
                    <th>Arrival Date</th>
                    <th>Action</th>
                </thead>
                <?php while($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['order_date']; ?></td>
                        <td><?php echo $row['arrival_date']; ?></td>
                        <td><a href="order-details.php?id=<?php echo $row['id']; ?>">View details...</a></td>
                    </tr>
                <?php } ?>
            </table>
        <?php } else { ?>
            <h4>You currently have no orders!</h4>
        <?php } ?>
    </div>
</div>
    
<?php require("includes/repetitions/footer.php"); ?>