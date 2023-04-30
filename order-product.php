<?php
    if(!isset($_SESSION['user_name'])){ ?>
        <script>window.location.replace("login-page.php");</script>
    <?php } 
?>


<?php
    $sql_ = "SELECT product_id FROM cart WHERE user_id=".$_SESSION['id'];
    $result_ = mysqli_query($conn, $sql_);
    $ids = array();
    if(mysqli_num_rows($result_) > 0){
        while($rows_ = mysqli_fetch_assoc($result_)){ $ids[] = $rows_['product_id']; }
        $id_list = "'".implode("', '", $ids)."'";
        $sql = "SELECT * FROM products WHERE id IN ($id_list)";
        $result = mysqli_query($conn, $sql);  
        print_r($result);
?>
<?php
    }
?>