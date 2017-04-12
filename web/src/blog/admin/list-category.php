<?php
include("include/header.php");
include("include/sidebar.php");
?>
<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
}
$query = "DELETE FROM category WHERE categoryID='$id';";
$db->query($query);
?>
        <div class="content">
            <h2>Category List</h2>
            <div class="list">
                <table>
                    <tr>
                        <th>Serial No.</th>
                        <th>Category Name</th>
                        <th>Action</th>
                    </tr>
<?php
$query = "SELECT * FROM category;";
$result = $db->query($query);
$count = 0;
while($value = $result->fetch_assoc()){
    $count++;
                    ?>
                    <tr>
                        <td><?php echo $count; ?></td>
                        <td><?php echo $value['name']; ?></td>
                        <td><a href="edit-category.php?id=<?php echo $value['categoryID'];?>">Edit</a> || <a onclick="return confirm('Are you sure want to delete this item?');" href="list-category.php?id=<?php echo $value['categoryID'];?>" >Delete</a></td>
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