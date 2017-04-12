<div class="main-content">
    <div class="sidebar">
        <!--
        <ul>
            <li>Site Option</li>
            <li><a href="#">Title & Description</a></li>
            <li><a href="#">Social Media</a></li>
            <li><a href="#">Copyright</a></li>
        </ul>
        <ul>
            <li>Update Page</li>
            <li><a href="#">About</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="#">Privacy</a></li>
        </ul>
        -->
<?php
if(Session::getSession('userRole') == 1){
?>
        <ul>
            <li>Category</li>
            <li><a href="add-category.php">Add Category</a></li>
            <li><a href="list-category.php">List Category</a></li>
        </ul>
<?php
}
?>
        <ul>
            <li>Post</li>
            <li><a href="add-post.php">Add Post</a></li>
            <li><a href="list-post.php">List Post</a></li>
        </ul>
    </div>