<?php
    require("includes/db/db_connection.php");
    require("includes/repetitions/header.php");
    $product_count = 0;

    if(!isset($_GET['filter'])){
        $sql = "SELECT * FROM products";
    }
    else {
        $sql = "SELECT * FROM products WHERE gender='".$_GET['filter']."'";
    }

    $result = mysqli_query($conn, $sql);
?>
<?php if(isset($_GET['status'])){ ?>
    <div class="container my-3">
    <?php if($_GET['status'] === "success"){ ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            The product was added to your cart!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php } else if($_GET['status'] === "failed") {?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            The product could not be added to your cart!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

        </div>
    <?php } ?>
    </div>
<?php } ?>

<div class="container py-5">
        <div class="row">
            <div class="col-lg-3">
                <h1 class="h2 pb-4">Categories</h1>
            </div>

            <div class="col-lg-9">
                <div class="row">
                    <div class="col-md-6">
                        <ul class="list-inline shop-top-menu pb-3 pt-1">
                            <li class="list-inline-item">
                                <a class="h3 text-dark text-decoration-none mr-3" href="<?php echo $_SERVER['PHP_SELF']; ?>">All</a>
                            </li>
                            <li class="list-inline-item">
                                <a class="h3 text-dark text-decoration-none mr-3" href="<?php echo $_SERVER['PHP_SELF']."?filter=Male"; ?>">Men's</a>
                            </li>
                            <li class="list-inline-item">
                                <a class="h3 text-dark text-decoration-none" href="<?php echo $_SERVER['PHP_SELF']."?filter=Female"; ?>">Women's</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
                <!-- Begin of product listings -->
                <?php while($row = mysqli_fetch_assoc($result)){ ?>
                    <?php if($product_count % 3 == 0 && $product_count != 0){
                        echo '</div><div class="row">';
                    } ?>
                    <div class="col-md-4 d-flex">
                        <div class="card mb-4 product-wap rounded-0">
                            <div class="card rounded-0">
                                <img class="card-img rounded-0 img-fluid h-100 w-100" src="<?php echo $row['picture']; ?>">
                                <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                    <ul class="list-unstyled">
                                        <li><a class="btn btn-success text-white mt-2" href="shop-single.php?product_id=<?php echo $row['id']; ?>"><i class="far fa-eye"></i></a></li>
                                        <li><a class="btn btn-success text-white mt-2" href="includes/sessions/add-cart.php?product_id=<?php echo $row['id']; ?>"><i class="fas fa-cart-plus"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <a href="shop-single.php?=<?php echo $row['id']; ?>" class="h3 text-decoration-none"><b><?php echo $row['name']; ?></b></a>
                                <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                                    <li class="pt-2">
                                        <span class="product-color-dot color-dot-red float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-blue float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-black float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-light float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-green float-left rounded-circle ml-1"></span>
                                    </li>
                                </ul>
                                <p class="">Available: <?php echo $row['quantity'];?></p>
                                <p>Gender: <?php echo $row['gender'];?></p>
                                <hr>
                                <h4 class="text-center text-success mb-0"><b>$<?php echo $row['price']; ?></b></h4>
                            </div>
                        </div>    
                    </div>
                <?php $product_count += 1; }?>
            </div>
        </div>
    </div>
    <!-- End Content -->

<?php

    require("includes/repetitions/footer.php");

?>
<script>
    $(document).ready(function(){
        $('#selected').on('change', function(){
            $('#order-form').submit();
        })
    });
</script>