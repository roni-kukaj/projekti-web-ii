<?php
require "includes/repetitions/header.php";
require "includes/db/db_manager_connection.php";
if(!isset($_SESSION['username']) && !isset($_SESSION['role'])){
    ?>
<script>
        window.location.replace('index.php');
</script>
<?php } ?>

<div class="container">
    <div class="my-5 text-center">
        <h3>Here are the recently asked questions in the site!</h3>
    </div>
    <?php
        $sql = "SELECT * FROM FAQ;";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
            $count = 0;    
        ?>
        <div class="my-3 accordion">
            <?php while($row = mysqli_fetch_assoc($result)){ ?>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse<?php echo $count;?>" aria-expanded="true" aria-controls="panelsStayOpen-collapse<?php echo $count;?>">
                            <?php echo $row['subject']; ?> - <?php echo $row['name']; ?>
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapse<?php echo $count;?>" class="accordion-collapse collapse">
                        <div class="accordion-body">
                            <strong><?php echo $row['email']; ?></strong> - <?php echo $row['message']; ?>
                        </div>
                    </div>
                </div>
            <?php $count+=1;} ?>
        </div>
    <?php
        }
        else {
            echo "<h3>No questions to display!</h3>";
        }
    ?>
</div>

<?php require "includes/repetitions/footer.php"; ?>