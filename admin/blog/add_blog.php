<?php
    include('../core/header.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST['titel'], $_POST['beschrijving'], $_FILES['afbeelding']['name'], $_POST['datum'])) {
            $titel = $_POST['titel'];
            $beschrijving = $_POST['beschrijving'];
            $datum = $_POST['datum'];

            // Bestandsupload verwerken
            $uploadDirectory = '../../assets/img/';
            // Controleer of de map bestaat, zo niet, maak deze dan aan
            if (!file_exists($uploadDirectory)) {
                mkdir($uploadDirectory, 0777, true); // Maak de map aan
            }
            $filename = $_FILES['afbeelding']['name'];
            $destination = $uploadDirectory . $filename;

            if (move_uploaded_file($_FILES["afbeelding"]["tmp_name"], $destination)) {
                echo "Het bestand ". basename($_FILES["afbeelding"]["name"]). " is succesvol geüpload.";
            } else {
                echo "Sorry, er is een fout opgetreden bij het uploaden van je bestand.";
            }

            // Voeg de nieuwe blog toe aan de database
            $insert_sql = "INSERT INTO blog (titel, beschrijving, afbeelding, datum) VALUES (?, ?, ?, ?)";
            $insert_stmt = $con->prepare($insert_sql);
            $insert_stmt->bind_param('ssss', $titel, $beschrijving, $filename, $datum);
            if ($insert_stmt->execute()) {
                echo "Blog succesvol toegevoegd.";
            } else {
                echo "Er is een fout opgetreden bij het toevoegen van de blog.";
            }
            $insert_stmt->close();
        } else {
            echo "Niet alle vereiste velden zijn ingevuld.";
        }
    }
?>
<h2>Blog toevoegen</h2>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
    <label for="titel">Titel:</label>
    <input type="text" id="titel" name="titel"><br>
    <label for="beschrijving">Beschrijving:</label>
    <textarea id="beschrijving" name="beschrijving"></textarea><br>
    <label for="afbeelding">Afbeelding:</label>
    <input type="file" id="afbeelding" name="afbeelding"><br>
    <label for="datum">Datum:</label>
    <input type="text" id="datum" name="datum"><br>
    <input type="submit" value="Toevoegen">
</form>
<?php
    include('../core/footer.php');
?>
