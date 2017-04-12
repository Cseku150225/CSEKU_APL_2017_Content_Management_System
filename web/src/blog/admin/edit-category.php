<?php
include("include/header.php");
include("include/sidebar.php");
?>
<?php
$id = 0;
if(isset($_GET['id'])){
    $id = $_GET['id'];
}
?>
        <div class="content">
            <h2>Add New Category</h2>
<?php
if(!empty($_POST)){
    $categoryName = $_POST['name'];
    
    if(!empty($_POST['name']))
    {
        $query = "UPDATE category SET name = '$categoryName' WHERE categoryID = '$id';";
        echo $query."<br>";
        $update = $db->query($query);
        if($update){
            echo "<span class='success'>category edited successfully.</span>";    
        }
        else{
            echo "<span class='error'>category edit failed.</span>";
        }
    }
}
?>
            <div class="entry">
                <form method="post" action="">
                    <table>
<?php
//echo $id;
$query = "SELECT name FROM category WHERE categoryID='$id';";
$result = $db->query($query);
if($result){
    $value = $result->fetch_assoc();
}
?>
                        <tr>
                            <td><label for="category">Category Name :</label></td>
                            <td><input type="text" name="name" value="<?php echo $value['name'];?>"></td>
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