<?php
    include('../core/header.php');

    if(isset($_GET['id'])) {
        $blog_id = $_GET['id'];

        $sql = "DELETE FROM blog WHERE id = ?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param('i', $blog_id);
        $stmt->execute();
        $stmt->close();
        
        echo "Blog met ID $blog_id is succesvol verwijderd.";
    } else {
        echo "Geen blog ID opgegeven.";
    }
    include('../core/footer.php');
?>
