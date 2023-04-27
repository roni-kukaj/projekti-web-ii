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
    $sql = "SELECT id, emri, mbiemri, email FROM users";
    $result = mysqli_query($conn, $sql);

?>
<div class="container">
    <h2 class="text-center my-5">Users Table</h2>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Lastname</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = mysqli_fetch_assoc($result)){ ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['emri']; ?></td>
                    <td><?php echo $row['mbiemri']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td>
                        <!-- <button type="submit" class="btn btn-link">More...</button> -->
                        <a href="user-info.php?user_id=<?php echo $row['id'];?>" class="btn btn-link">More...</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<?php require "includes/repetitions/footer.php"; ?>