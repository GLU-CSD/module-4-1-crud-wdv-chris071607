<?php
    include('../core/header.php');

    // Controleren of er een product ID is doorgegeven
    if(isset($_GET['id'])) {
        $product_id = $_GET['id'];

        // Het verwijderen van het product uit de database
        $sql = "DELETE FROM producten WHERE id = ?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param('i', $product_id);
        $stmt->execute();
        $stmt->close();
        
        echo "Product met ID $product_id is succesvol verwijderd.";
    } else {
        echo "Geen product ID opgegeven.";
    }
    include('../core/footer.php');
?>
