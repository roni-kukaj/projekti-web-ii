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
    $sql = "DELETE * FROM users WHERE id = ".$_GET['user_id'];
    if(mysqli_query($conn, $sql)){
        header("Location: users.php");
        exit();
    }
    else{
        header("Location: users.php?error=The action could not be performed!");
        exit();
    }
?>