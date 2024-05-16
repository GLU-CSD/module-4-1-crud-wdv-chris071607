<?php
    include('../core/header.php');
    include('../core/checklogin_admin.php');
?>

<div class="row">
    <div class="col-md-12">
        <a href="add_blog.php" class="btn btn-primary mb-2">Blog toevoegen</a>
    </div>
</div>

<div class="row">
    <table class="table">
        <tr>
            <th>ID</th>
            <th>Titel</th>
            <th>Beschrijving</th>
            <th>Datum</th>
            <th>Afbeelding</th>
            <th>Bewerken</th>
            <th>Verwijderen</th>
        </tr>
        <?php
            $sql = "SELECT id, titel, beschrijving, datum, afbeelding FROM blog;";
            $liqry = $con->prepare($sql);
            if($liqry === false) {
                echo mysqli_error($con);
            } else {
                if($liqry->execute()) {
                    $liqry->bind_result($id, $titel, $beschrijving, $datum, $afbeelding);
                    while($liqry->fetch()) {
        ?>
                        <tr>
                            <td><?php echo $id;?></td>
                            <td><?php echo $titel;?></td>
                            <td><?php echo $beschrijving;?></td>
                            <td><?php echo $datum;?></td>
                            <td><?php echo $afbeelding;?></td>
                            <td><a href="edit_blog.php?id=<?php echo $id;?>">Bewerken</a></td>
                            <td><a href="delete_blog.php?id=<?php echo $id;?>" onclick="return confirm('Weet je zeker dat je deze blog wilt verwijderen?')">Verwijderen</a></td>
                        </tr>
        <?php
                    }
                }
                $liqry->close();
            }
        ?>
    </table>
</div>

<?php
    include('../core/footer.php');
?>
