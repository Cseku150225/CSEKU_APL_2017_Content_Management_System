<?php
include("include/header.php");
include("include/sidebar.php");
?>
        <div class="content">
            <h2>Change Password for <?php echo Session::getSession('username');?></h2>
<?php
if(!empty($_POST)){
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $re_password = $_POST['re_password'];
    $userID = Session::getSession('userID');

    if($new_password == $re_password){
        $query = "UPDATE user_info SET password = '$new_password' WHERE userID = '$userID';";
        $result = $db->query($query);
        
        if($result){
            echo "<span class='success'>successfully changed password.</span>";
        }
        else{
            echo "<span class='error'>failed to change password.</span>";    
        }
    }
    else{
        echo "<span class='error'>password has not matched.</span>";
    }
}
?>
            <div class="entry">
                <form method="POST" action="">
                    <table>
                        <tr>
                            <td><label for="password">old password :</label></td>
                            <td><input type="password" name="old_password" placeholder="old password"></td>
                        </tr>
                        <tr>
                            <td><label for="password">new password :</label></td>
                            <td><input type="password" name="new_password" placeholder="new password"></td>
                        </tr>
                        <tr>
                            <td><label for="password">re-enter new password :</label></td>
                            <td><input type="password" name="re_password" placeholder="re-enter new password"></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td><input type="submit" name="submit" value="Change Password"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
<?php
include("include/footer.php");
?>