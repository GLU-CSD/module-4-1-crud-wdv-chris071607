<?php
    include('../core/header.php');
    include('../core/checklogin_admin.php');
?>

<div class="row">
    <div class="col-md-12">
        <a href="add_product.php" class="btn btn-primary mb-2">Product toevoegen</a>
    </div>
</div>

<div class="row">
    <table class="table">
        <tr>
            <th>ID</th>
            <th>Titel</th>
            <th>Beschrijving</th>
            <th>Afbeelding</th>
            <th>Prijs</th>
            <th>Bewerken</th>
            <th>Verwijderen</th>
        </tr>
        <?php
            $sql = "SELECT id, titel, beschrijving, afbeelding_1, prijs FROM producten;";
            $liqry = $con->prepare($sql);
            if($liqry === false) {
                echo mysqli_error($con);
            } else {
                if($liqry->execute()) {
                    $liqry->bind_result($id, $titel, $beschrijving, $afbeelding_1, $prijs);
                    while($liqry->fetch()) {
        ?>
                        <tr>
                            <td><?php echo $id;?></td>
                            <td><?php echo $titel;?></td>
                            <td><?php echo $beschrijving;?></td>
                            <td><?php echo $afbeelding_1;?></td>
                            <td><?php echo $prijs;?></td>
                            <td><a href="edit_product.php?id=<?php echo $id;?>">Bewerken</a></td>
                            <td><a href="delete_product.php?id=<?php echo $id;?>" onclick="return confirm('Weet je zeker dat je dit product wilt verwijderen?')">Verwijderen</a></td>
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
