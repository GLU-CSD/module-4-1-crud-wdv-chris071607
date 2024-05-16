<?php
    include('../core/header.php');
    include('../core/checklogin_admin.php');
?>
<table border="1">
    <tr>
        <td>ID</td>
        <td>EMAIL</td>
        <td>DATETIME</td>
    </tr>
<?php
    $sql = "SELECT admin_user_id, email, datetime FROM admin_user;";
    $liqry = $con->prepare($sql);
    if($liqry === false) {
        echo mysqli_error($con);
    } else{
        // $liqry->bind_param('s',$email);
        $liqry->bind_result($admin_user_id, $email, $datetime);
        if($liqry->execute()){
            $liqry->store_result();
            while($liqry->fetch()){
                ?>
                <tr>
                    <td>
                        <a href="edit_user.php?user_id=<?php echo $admin_user_id;?>"><?php echo $admin_user_id;?></a>
                    </td>
                    <td><?php echo $email;?></td>
                    <td><?php echo $datetime;?></td>
                </tr>
                <?php
            }
        }
        $liqry->close();
    }
?>
</table>
<?php
    include('../core/footer.php');
?>