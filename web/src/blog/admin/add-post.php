<?php
include("include/header.php");
include("include/sidebar.php");
?>
        <div class="content">
            <h2>Add New Post</h2>
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $title = $_POST['title'];
    $category = $_POST['category'];
    $image = $_FILES['image']['name'];
    $content = $_POST['content'];
    $author = $_POST['author'];

    $folder = 'upload/';
    move_uploaded_file($_FILES['image']['tmp_name'], $folder.$image);

    if(!empty($_POST['title']) &&!empty($_POST['category'])&& !empty($_POST['content']) && !empty($_POST['author']))
    {
        $query = "INSERT INTO 
                    post(
                        category,
                        title,
                        content,
                        image,
                        author,
                        month_year,
                        year) 
                    VALUES (
                        '$category',
                        '$title',
                        '$content',
                        '$image',
                        '$author',
                        DATE_FORMAT(NOW(),'%Y-%m'),
                        DATE_FORMAT(NOW(),'%Y')
                    );";
        $db->query($query);
        echo "<span class='success'>new post add successful.</span>";
    }
    else{
        echo "<span class='error'>new post add failed.</span>";
    }
}
?>
            <div class="entry">
                <form method="post" action="" enctype="multipart/form-data">
                    <table>
                        <tr>
                            <td><label for="title">Title :</label></td>
                            <td><input type="text" name="title" placeholder="title"></td>
                        </tr>
                        <tr>
                            <td><label for="category">Category :</label></td>
                            <td>
                                <select name="category">
                                    <option>Choose Category</option>
<?php
$query = "SELECT * FROM category";
$result = $db->query($query);
while($value = $result->fetch_assoc()){
                                    ?>
                                    <option value="<?php echo $value['categoryID']; ?>"><?php echo $value['name'];?></option>
                                    <?php
}
?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="image">Image :</label></td>
                            <td><input type="file" name="image"></td>
                        </tr>
                        <tr>
                            <td><label for="content">Content :</label></td>
                            <td><textarea name='content' rows="10" cols="100"></textarea></td>
                        </tr>
                        <tr>
                            <td><label for="author">Author :</label></td>
                            <td><input type="text" name="author" value="<?php echo Session::getSession('username'); ?>" readonly ></td>
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