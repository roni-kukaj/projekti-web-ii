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
        window.location.replace('users.php');
    </script>
<?php } ?>

<?php
    $sql = "DELETE FROM users WHERE id = {$_GET['id']}";
    if(mysqli_query($conn, $sql)){
?>
        <script>
            window.location.replace('users.php');
        </script>
<?php
        exit();
    }
    else{
        header("Location: user-info.php?id={$_GET['id']}&error=The action could not be performed!");
        exit();
    }
?>