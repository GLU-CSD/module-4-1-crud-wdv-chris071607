<?php
    include('../core/header.php');

    if(isset($_GET['id'])) {
        $blog_id = $_GET['id'];

        $sql = "SELECT titel, beschrijving, afbeelding, datum FROM blog WHERE id = ?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param('i', $blog_id);
        $stmt->execute();
        $stmt->bind_result($titel, $beschrijving, $afbeelding, $datum);
        $stmt->fetch();
        $stmt->close();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if(isset($_POST['blog_id'], $_POST['titel'], $_POST['beschrijving'], $_POST['datum'])) {
                $blog_id = $_POST['blog_id'];
                $titel = $_POST['titel'];
                $beschrijving = $_POST['beschrijving'];
                $datum = $_POST['datum'];

                $filename = $afbeelding;
                // Als er een nieuwe afbeelding is geüpload, verwerk deze
                if(isset($_FILES['afbeelding']) && $_FILES['afbeelding']['error'] == UPLOAD_ERR_OK) {
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
                }

                $update_sql = "UPDATE blog SET titel = ?, beschrijving = ?, afbeelding = ?, datum = ? WHERE id = ?";
                $update_stmt = $con->prepare($update_sql);
                $update_stmt->bind_param('ssssi', $titel, $beschrijving, $filename, $datum, $blog_id);
                if ($update_stmt->execute()) {
                    echo "Blog succesvol bijgewerkt.";
                } else {
                    echo "Er is een fout opgetreden bij het bijwerken van de blog.";
                }
                $update_stmt->close();
            } else {
                echo "Niet alle vereiste velden zijn ingevuld.";
            }
        }
?>
        <h2>Blog bewerken</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?id=' . $blog_id; ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="blog_id" value="<?php echo $blog_id; ?>">
            <label for="titel">Titel:</label>
            <input type="text" id="titel" name="titel" value="<?php echo $titel; ?>"><br>
            <label for="beschrijving">Beschrijving:</label>
            <textarea id="beschrijving" name="beschrijving"><?php echo $beschrijving; ?></textarea><br>
            <label for="afbeelding">Afbeelding:</label>
            <input type="file" id="afbeelding" name="afbeelding"><br>
            <label for="datum">Datum:</label>
            <input type="text" id="datum" name="datum" value="<?php echo $datum; ?>"><br>
            <input type="submit" value="Opslaan">
        </form>
<?php
    } else {
        echo "Geen blog ID opgegeven.";
    }
    include('../core/footer.php');
?>
