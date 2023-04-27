<?php
require "includes/repetitions/header.php";
if(!isset($_SESSION['username']) && !isset($_SESSION['role'])){
?>
<script>
        window.location.replace('index.php');
</script>
<?php } ?>