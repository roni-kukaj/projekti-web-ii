<?php  
require("../db/db_connection.php");

if(isset($_POST['update'])){
    session_start();
    $query = "UPDATE users SET emri='".$_POST['emri']."', mbiemri='".$_POST['mbiemri']."' WHERE id=".$_GET['id'];

    $query_run = mysqli_query($conn,$query);

    
}
?>