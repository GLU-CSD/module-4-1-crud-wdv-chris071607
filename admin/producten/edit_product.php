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

        // Als er een POST-verzoek is, het formulier verwerken
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Controleer of alle vereiste velden zijn ingevuld
            if(isset($_POST['product_id'], $_POST['titel'], $_POST['beschrijving'], $_FILES['afbeelding_1']['name'], $_POST['prijs'])) {
                // Haal de gegevens uit het formulier op
                $product_id = $_POST['product_id'];
                $titel = $_POST['titel'];
                $beschrijving = $_POST['beschrijving'];
                $prijs = $_POST['prijs'];

                $uploadDirectory = '../../assets/img/';
                $filename = $_FILES['afbeelding_1']['name'];
                $destination = $uploadDirectory . $filename; // juiste variabele gebruiken
                
                if (move_uploaded_file($_FILES["afbeelding_1"]["tmp_name"], $destination)) { // juiste velden gebruiken
                    echo "Het bestand ". basename( $_FILES["afbeelding_1"]["name"]). " is succesvol geüpload.";
                } else {
                    echo "Sorry, er is een fout opgetreden bij het uploaden van je bestand.";
                }   

                // Voer de updatequery uit
                $update_sql = "UPDATE producten SET titel = ?, beschrijving = ?, afbeelding_1 = ?, prijs = ? WHERE id = ?";
                $update_stmt = $con->prepare($update_sql);
                $update_stmt->bind_param('ssssi', $titel, $beschrijving, $filename, $prijs, $product_id);
                if ($update_stmt->execute()) {
                    echo "Product succesvol bijgewerkt.";
                } else {
                    echo "Er is een fout opgetreden bij het bijwerken van het product.";
                }
                $update_stmt->close();
            } else {
                echo "Niet alle vereiste velden zijn ingevuld.";
            }
        }
?>
        <h2>Product bewerken</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?id=' . $product_id; ?>" method="post" enctype="multipart/form-data">

            <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
            <label for="titel">Titel:</label>
            <input type="text" id="titel" name="titel" value="<?php echo $titel; ?>"><br>
            <label for="beschrijving">Beschrijving:</label>
            <textarea id="beschrijving" name="beschrijving"><?php echo $beschrijving; ?></textarea><br>
            <label for="afbeelding_1">Afbeelding:</label>
            <input type="file" id="afbeelding_1" name="afbeelding_1"><br>
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
