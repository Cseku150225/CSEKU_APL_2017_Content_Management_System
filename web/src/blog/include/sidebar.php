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
                	</li>

            	
				
<?php
	}
}
?>
						</ul>
		</div>
    </div>