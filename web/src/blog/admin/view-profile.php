<?php
include("include/header.php");
include("include/sidebar.php");
?>
<?php
    $id = $_GET['id'];
?>
        <div class="content">
            <h2>Add New Post</h2>
<?php

if(!empty($_POST)){
    $name = $_POST['name'];
    $details = $_POST['details'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $role = $_POST['role'];

    $query = "UPDATE 
                user_info 
              SET name = '$name',
                details = '$details',
                email = '$email',
                username = '$username',
                role = '$role'
              WHERE userID = '$id';";
    
    $update = $db->query($query);
    if($update){
        echo "<span class='success'>user profile update successful.</span>";
    }
    else{
        echo "<span class='error'>user profile update failed.</span>";
    }
}

?>
            <div class="entry">
                <form method="post" action="">
<?php
$query = "SELECT * FROM user_info WHERE userID='$id';";
$result = $db->query($query);
if($result){
    $user = $result->fetch_object();
}
?>
                    <table>
                        <tr>
                            <td><label for="name">Name :</label></td>
                            <td><input type="text" name="name" value="<?php echo $user->name; ?>"></td>
                        </tr>
                        <tr>
                            <td><label for="details">Details :</label></td>
                            <td>
                                <textarea name='details' rows="10" cols="100">
                                    <?php echo $user->details; ?>
                                </textarea>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="email">Email :</label></td>
                            <td><input type="text" name="email" value="<?php echo $user->email; ?>"></td>
                        </tr>
                        <tr>
                            <td><label for="username">Username :</label></td>
                            <td><input type="text" name="username" value="<?php echo $user->username; ?>"></td>
                        </tr>
                        <tr>
                            <td><label for="role">Role :</label></td>
                            <td>
                                <select name="role">
                                    <option>Select Role</option>
                                    <option value="1" <?php if($user->role==1){ echo 'selected'; } ?> >Admin</option>
                                    <option value="2" <?php if($user->role==2){ echo 'selected'; } ?> >Author</option>
                                    <option value="3" <?php if($user->role==3){ echo 'selected'; } ?> >Editor</option>
                                </select>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>&nbsp;</td>
                            <td><input type="submit" name="submit" value="Save"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
<?php
include("include/footer.php");
?>