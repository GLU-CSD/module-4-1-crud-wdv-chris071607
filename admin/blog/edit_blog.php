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
            if(isset($_POST['blog_id'], $_POST['titel'], $_POST['beschrijving'], $_POST['afbeelding'], $_POST['datum'])) {
                $blog_id = $_POST['blog_id'];
                $titel = $_POST['titel'];
                $beschrijving = $_POST['beschrijving'];
                $afbeelding = $_POST['afbeelding'];
                $datum = $_POST['datum'];

                $update_sql = "UPDATE blog SET titel = ?, beschrijving = ?, afbeelding = ?, datum = ? WHERE id = ?";
                $update_stmt = $con->prepare($update_sql);
                $update_stmt->bind_param('ssssi', $titel, $beschrijving, $afbeelding, $datum, $blog_id);
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
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?id=' . $blog_id; ?>" method="post">
            <input type="hidden" name="blog_id" value="<?php echo $blog_id; ?>">
            <label for="titel">Titel:</label>
            <input type="text" id="titel" name="titel" value="<?php echo $titel; ?>"><br>
            <label for="beschrijving">Beschrijving:</label>
            <textarea id="beschrijving" name="beschrijving"><?php echo $beschrijving; ?></textarea><br>
            <label for="afbeelding">Afbeelding:</label>
            <input type="text" id="afbeelding" name="afbeelding" value="<?php echo $afbeelding; ?>"><br>
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
