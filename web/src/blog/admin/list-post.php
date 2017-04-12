<?php
include("include/header.php");
include("include/sidebar.php");
?>
<?php

if(isset($_GET['id'])){
    $id = $_GET['id'];
}
?>
<?php
$query = "DELETE FROM post WHERE id='$id';";
$delete = $db->query($query);

?>
        <div class="content">
            <h2>Post List</h2>
            <iframe src="iframe.php" height="90%" width="100%" style="border:none;"></iframe>
        </div>
<?php
include("include/footer.php");
?>