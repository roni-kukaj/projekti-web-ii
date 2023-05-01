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
    $sql = "SELECT * FROM FAQ;";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            print_r($row);
        }
    }
?>

<?php require "includes/repetitions/footer.php"; ?>