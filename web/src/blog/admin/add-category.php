<?php
include("include/header.php");
include("include/sidebar.php");
?>

        <div class="content">
            <h2>Add New Category</h2>
<?php
if(!empty($_POST)){
    $categoryName = $_POST['name'];
    
    if(!empty($_POST['name']))
    {
        $query = "INSERT INTO category(name) VALUES ('$categoryName');";
        $db->query($query);
        echo"<span class='success'>new category add successful.</span>";
    }
    else{
        echo "<span class='error'>new category add failed.</span>";
    }
}
?>
            <div class="entry">
                <form method="post" action="add-category.php">
                    <table>
                        <tr>
                            <td><label for="category">Category Name :</label></td>
                            <td><input type="text" name="name" placeholder="Category Name"></td>
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