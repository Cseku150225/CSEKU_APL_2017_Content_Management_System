<?php
include("include/header.php");
include("include/sidebar.php");
?>
<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
}
?>
<?php
$query = "DELETE FROM user_info WHERE userID='$id';";
$delete = $db->query($query);
?>
        <div class="content">
            <h2>Post List</h2>
<?php
$query = "SELECT * FROM user_info;";

$result = $db->query($query);
?>
            <div class="list">
                <table>
                    <tr>
                        <th>Email</th>
                        <th>Username</th>
                        <th>User Role</th>
                        <th>Action</th>
                    </tr>
<?php
while($value = $result->fetch_assoc()){
                    ?>
                    <tr>
                        <td><?php echo $value['email'];?></td>
                        <td><?php echo substr($value['username'],0,23);?></td>
                        <td><?php echo userRole($value['role']);?></td>
                        <td>
                            <a href="view-profile.php?id=<?php echo $value['userID'];?>">View</a>
<?php
if(Session::getSession('userRole') == 1){
?>                          ||
                            <a onclick="return confirm('Are you sure want to delete this item?');"                              href="list-user.php?id=<?php echo $value['userID'];?>">Delete</a>
<?php
 } 
?>
                        </td>
                    </tr>
<?php
}
?>
                </table>
            </div>
        </div>
<?php
include("include/footer.php");
?>