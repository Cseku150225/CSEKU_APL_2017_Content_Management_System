<?php
include("include/header.php");
include("config/config.php");
include("library/database.php");
include("library/function.php");
?>
<?php
if(isset($_GET['page'])){
    $page = $_GET['page'];    
}
else{
    $page = 1;
}
$num_post=3;
$start_page = ($page-1)*$num_post;
$query = "SELECT * FROM post";
$result = $db->query($query);
$total_row = $result->num_rows;
$total_page = ceil($total_row/$num_post);
?>
<!-- #end navigation -->
    <div id="page" class="overflow">
        <div id="content" class="overflow">
<?php
$query = "SELECT * FROM post ORDER BY publish_date DESC LIMIT $start_page,$num_post ;";
$result =$db->query($query);
if($result){
	while($post = $result->fetch_assoc()){
?>          
			<div class="post overflow">
                <h2><a href="post.php?id=<?php echo $post['id']; ?>"><?php echo $post['title']; ?></a></h2>
                <p class="meta">
                    Posted by <a href="#"><?php echo $post['author']; ?></a> on <?php echo formatDate($post['publish_date']);?>&nbsp;&bull;&nbsp;<a href="post.php?id=<?php echo $post['id']; ?>" class="permalink">Full article</a>
                </p>
                <a href="post.php?id=<?php echo $post['id']; ?>"><img src="admin/upload/<?php echo $post['image']; ?>" alt="post image"></a>   
                <p>
				<?php echo formatText($post['content']);?>
                </p>
            </div>
<?php
	}
}
?>
<!-- pagination-->
<?php
for($i=1; $i<=$total_page; $i++){
    echo "<span class='pagination'><a href='index.php?page=$i'>$i</a></span>";
}
?>
<!--pagination-->			
        </div>
<!-- #end content -->

 
<?php
include("include/sidebar.php");
include("include/footer.php");
?>