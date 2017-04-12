<?php
include("include/header.php");
include("config/config.php");
include("library/database.php");
include("library/function.php");
?>
<?php
$year = $_GET['id'];
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
$query = "SELECT * FROM post WHERE year='$year'";
$result = $db->query($query);
$total_row = $result->num_rows;
$total_page = ceil($total_row/$num_post);
?>
<!-- #end navigation -->
    <div id="page" class="overflow">
        <div id="content" class="overflow">
<?php
$query = "SELECT * FROM post WHERE year='$year'ORDER BY publish_date DESC LIMIT $start_page,$num_post;";
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
    echo "<span class='pagination'><a href='date.php?id=$year&page=$i'>$i</a></span>";
}
?>
<!--pagination-->			
        </div>
<!-- #end content -->
<?php
$query = "SELECT * FROM category;";
$result = $db->query($query);
?>
       <div id="sidebar" class="overflow">
            <h2>Categories</h2>
            <ul>
<?php
while($value = $result->fetch_assoc()){
?>
                <li><a href="category.php?category=<?php echo $value['categoryID'];?>"><?php echo $value['name'];?></a></li>
<?php   
}
?>
            </ul>
            <h2>Archive</h2>
            <ul>
                    
<?php
$query = "SELECT DISTINCT year FROM post WHERE year <> 0 ORDER BY year DESC;";
$result = $db->query($query);

if($result){
    while($value = $result->fetch_object()){
?>
                    <li><a href="date.php?id=<?php echo $value->year; ?>"><?php echo $value->year; ?></a>
                        <div class="archive">
                            <ul>
                    <?php
                    if($year == $value->year){
                        $sql = "SELECT DISTINCT month_year, COUNT(id) AS num_post FROM post Group BY month_year HAVING month_year LIKE '$year-%' ORDER BY month_year DESC;";
                        $resource = $db->query($sql);
                        if($resource){
                            while($month = $resource->fetch_object()){
                                ?>
                                    <li><a href="date_month.php?<?php echo "year=$year&"."id=".$month->month_year;?>"><?php echo formatMonth($month->month_year)."($month->num_post)";?></a></li>
                                <?php
                            }
                        }
                    }
                    ?>
                            </ul>
                        </div>
                    </li>
<?php
    }
}
?>
            </ul>
            </div>
        </div>
    </div>
 
<?php
include("include/footer.php");
?>