<?php
include('core/header.php');

// Check of het ID bestaat in de URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    // Ontvang het ID uit de URL
    $product_id = $_GET['id'];

    // Query om het product op te halen op basis van het ID
    $sql = "SELECT titel, afbeelding_1, prijs, beschrijving FROM producten WHERE id = $product_id";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) == 1) {
        // Productgegevens ophalen
        $row = mysqli_fetch_assoc($result);
        ?>
        <div class="row d-flex justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="images p-3">
                                <div class="text-center p-4">
                                    <img id="main-image" src="assets/img/<?php echo $row["afbeelding_1"]; ?>" width="250" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="product p-4">
                                <div class="mt-4 mb-3"> <span class="text-uppercase text-muted brand">Spieropbouw</span>
                                    <h5 class="text-uppercase"><?php echo $row["titel"]; ?></h5>
                                    <div class="price d-flex flex-row align-items-center">
                                        <span class="act-price">€<?php echo $row["prijs"]; ?></span>
                                    </div>
                                </div>
                                <p class="about"><?php echo $row["beschrijving"]; ?></p>
                                <div class="cart mt-4 align-items-center">
                                    <button class="btn btn-danger text-uppercase mr-2 px-4">Add to cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    } else {
        echo "Product not found.";
    }
} else {
    echo "Invalid product ID.";
}

include('core/footer.php');
?>
