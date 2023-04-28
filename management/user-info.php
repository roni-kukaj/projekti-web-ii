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
    <div class="col-md-4">
    <img src="../<?php echo $data['profile_picture'] ?>" alt="User Profile Image" class="img-fluid rounded-circle mb-3">
    </div>
    <div class="col-md-8">
        <ul>
            <li>Emri: <b><?php echo $data['emri']; ?></b></li>
        </ul>
    </div>
</div>


<?php require "includes/repetitions/footer.php"; ?>