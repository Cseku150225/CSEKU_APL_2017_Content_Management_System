<?php
include("include/header.php");
include("include/sidebar.php");
?>
<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
}
?>
        <div class="content">
            <h2>Add New Post</h2>
<?php
if(!empty($_POST)){
    $title = $_POST['title'];
    $category = $_POST['category'];
    $content = $_POST['content'];
    $author = $_POST['author'];

    if(!empty($_POST['title']) && !empty($_POST['category']) && !empty($_POST['content']) && !empty($_POST['author']))
    {
        $query = "UPDATE post SET category ='$category',title = '$title',content = '$content',author = '$author' WHERE id='$id';";
        $update = $db->query($query);
        if($update){
            echo "Post Edit Successful;";
        }
        else{
            echo "Post Edit Failed.";
        }
    }
}
?>
            <div class="entry">
                <form method="post" action="">
<?php
$query = "SELECT * FROM post WHERE id='$id';";
$result = $db->query($query);
if($result){
    $post = $result->fetch_object();
}
?>
                    <table>
                        <tr>
                            <td><label for="title">Title :</label></td>
                            <td><input type="text" name="title" value="<?php echo $post->title; ?>" readonly></td>
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
                                    <option value="<?php echo $value['categoryID'];?>" <?php if($value['categoryID']==$post->category){ echo 'selected'; }?> ><?php echo $value['name'];?></option>
<?php
}
?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="content">Content :</label></td>
                            <td>
                                <textarea name='content' rows="10" cols="100" readonly>
                                    <?php echo $post->content; ?>
                                </textarea>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="author">Author :</label></td>
                            <td><input type="text" name="author" value="<?php echo $post->author; ?>" readonly></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
<?php
include("include/footer.php");
?>