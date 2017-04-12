<?php
include("include/header.php");
include("config/config.php");
include("library/database.php");
include("library/function.php");
?>
<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
}
$query = "SELECT * FROM post WHERE id='$id'";
$result = $db->query($query);
$value = $result->fetch_object();
?>
<!-- #end navigation -->
    <div id="page" class="overflow">
        <div id="content" class="overflow">
            <div class="post overflow">
                <h2><a href="post.php?id=<?php echo $value->id; ?>"><?php echo $value->title; ?></a></h2>
                <p class="meta">Posted by <a href="#">author name</a>&nbsp;&bull;&nbsp;<?php echo formatDate($value->publish_date); ?></p>
                <img src="admin/upload/<?php echo $value->image; ?>" alt="post image">   
                <p>
                    <?php echo $value->content; ?>
                </p>
            </div>
            <div class="related-post overflow">
                <h2>Related Posts</h2>
                <ul>
<?php
$category = $value->category;
$query = "SELECT id,title FROM post WHERE category='$category' LIMIT 5;";
$result = $db->query($query);
if($result){
    while($value=$result->fetch_assoc()){
?>
            
                    <li><a href="post.php?id=<?php echo $value['id']; ?>"><?php echo $value['title']; ?></a></li>
                
<?php
    }
}
else{
    echo "No related article found.";
}
?>
                </ul>
            </div>
        </div>
<!-- #end content -->
<?php
include("include/sidebar.php");
include("include/footer.php");
?>