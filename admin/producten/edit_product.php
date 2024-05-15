<?php
    include('../core/header.php');

    // Controleren of er een product ID is doorgegeven
    if(isset($_GET['id'])) {
        $product_id = $_GET['id'];

        // Het ophalen van de productgegevens uit de database
        $sql = "SELECT titel, beschrijving, afbeelding_1, prijs FROM producten WHERE id = ?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param('i', $product_id);
        $stmt->execute();
        $stmt->bind_result($titel, $beschrijving, $afbeelding_1, $prijs);
        $stmt->fetch();
        $stmt->close();
?>
        <h2>Product bewerken</h2>
        <form action="edit_product_process.php" method="post">
            <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
            <label for="titel">Titel:</label>
            <input type="text" id="titel" name="titel" value="<?php echo $titel; ?>"><br>
            <label for="beschrijving">Beschrijving:</label>
            <textarea id="beschrijving" name="beschrijving"><?php echo $beschrijving; ?></textarea><br>
            <label for="afbeelding_1">Afbeelding:</label>
            <input type="text" id="afbeelding_1" name="afbeelding_1" value="<?php echo $afbeelding_1; ?>"><br>
            <label for="prijs">Prijs:</label>
            <input type="text" id="prijs" name="prijs" value="<?php echo $prijs; ?>"><br>
            <input type="submit" value="Opslaan">
        </form>
<?php
    } else {
        echo "Geen product ID opgegeven.";
    }
    include('../core/footer.php');
?>
