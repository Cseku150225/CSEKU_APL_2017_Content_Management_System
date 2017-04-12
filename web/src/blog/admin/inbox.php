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
$query = "DELETE FROM contact WHERE id='$id';";
$result = $db->query($query);
?>
	<div class="content">
		<div class="list">
            <table>
                <tr>
                    <th>Name</th>
                    <th>Website</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
<?php
$query = "SELECT * FROM contact;";
$result = $db->query($query);
if($result){
	$count = 0;
	while($value = $result->fetch_assoc()){
    	$count++;
?>
                <tr>
                    <td><?php echo $value['name']; ?></td>
                    <td><?php echo $value['website']; ?></td>
                    <td><?php echo $value['email']; ?></td>
                    <td>
                    	<a href="view.php?id=<?php echo $value['id'];?>">View</a>
                    	||
                    	<a href="reply.php?id=<?php echo $value['id'];?>">Reply</a>
                    	|| 
                    	<a onclick="return confirm('Are you sure want to delete this item?');" href="inbox.php?id=<?php echo $value['id'];?>" >Delete</a>
                    </td>
                </tr>
<?php
	}
}
?>
            </table>
        </div>
	</div>
<?php
include("include/footer.php");
?>