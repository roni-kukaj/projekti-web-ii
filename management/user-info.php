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

<h3>Ketu do te shtohen te dhenat e user-it dhe gjithashtu do te shtohen te gjitha porosite te cilat i ka bere</h3>
<h4>ID: <?php echo $_GET['user_id']; ?></h4>