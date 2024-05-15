<?php
    include('core/header.php');
?>
<div class="row">
    <div class="col">
        <h1 class="text-center">WELCOME</h1>
    </div>
</div>

<div class="row mb-3">
   <div class="col">
        <img src="assets/img/optimum.png" width = 10000 class="img-fluid" alt="">
   </div>
</div>
<div class="row">
    <div class="col-12">
        <h2 class="text-center">Latest products</h2>
    </div>

    
    <?php

    $sql = "SELECT titel, id, afbeelding_1, prijs FROM producten order by RAND() LIMIT 3";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="col-4 mb-3">
                <div class="card w-100">
                    <img src="assets/img/<?php echo $row["afbeelding_1"]; ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo ($row["titel"]); ?></h5>
                        <p class="card-text"><?php echo $row["prijs"]; ?></p>
                        <a href="product.php?id=<?php echo ($row["id"]); ?>" class="btn btn-primary">Buy Now</a>
                    </div>
                </div>
            </div>
            <?php
        }
    } else {
        echo "No products found.";
    }
    ?>
    <div class="col-12 text-center">
    <a href="products.php" class="btn btn-info">Show ALL products</a>
    </div>
<?php
    include('core/footer.php');
?>
