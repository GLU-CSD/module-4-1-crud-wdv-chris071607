<?php
    include('../core/header.php');

    // Als er een POST-verzoek is, het formulier verwerken
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Controleer of alle vereiste velden zijn ingevuld
        if(isset($_POST['titel'], $_POST['beschrijving'], $_FILES['afbeelding_1']['name'], $_POST['prijs'])) {
            // Haal de gegevens uit het formulier op
            $titel = $_POST['titel'];
            $beschrijving = $_POST['beschrijving'];
            $prijs = $_POST['prijs'];

            // Bestandsupload verwerken
            $uploadDirectory = '../../assets/img/';
            // Controleer of de map bestaat, zo niet, maak deze dan aan
            if (!file_exists($uploadDirectory)) {
                mkdir($uploadDirectory, 0777, true); // Maak de map aan
            }
            $filename = $_FILES['afbeelding_1']['name'];
            $destination = $uploadDirectory . $filename;

            if (move_uploaded_file($_FILES["afbeelding_1"]["tmp_name"], $destination)) {
                echo "Het bestand ". basename($_FILES["afbeelding_1"]["name"]). " is succesvol geüpload.";
            } else {
                echo "Sorry, er is een fout opgetreden bij het uploaden van je bestand.";
            }

            // Voeg het nieuwe product toe aan de database
            $insert_sql = "INSERT INTO producten (titel, beschrijving, afbeelding_1, prijs) VALUES (?, ?, ?, ?)";
            $insert_stmt = $con->prepare($insert_sql);
            $insert_stmt->bind_param('sssd', $titel, $beschrijving, $filename, $prijs);
            if ($insert_stmt->execute()) {
                echo "Product succesvol toegevoegd.";
            } else {
                echo "Er is een fout opgetreden bij het toevoegen van het product.";
            }
            $insert_stmt->close();
        } else {
            echo "Niet alle vereiste velden zijn ingevuld.";
        }
    }
?>
<h2>Product toevoegen</h2>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
    <label for="titel">Titel:</label>
    <input type="text" id="titel" name="titel"><br>
    <label for="beschrijving">Beschrijving:</label>
    <textarea id="beschrijving" name="beschrijving"></textarea><br>
    <label for="afbeelding_1">Afbeelding:</label>
    <input type="file" id="afbeelding_1" name="afbeelding_1"><br>
    <label for="prijs">Prijs:</label>
    <input type="text" id="prijs" name="prijs"><br>
    <input type="submit" value="Toevoegen">
</form>
<?php
    include('../core/footer.php');
?>
