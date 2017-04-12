<?php
include("../config/config.php");
include("../library/database.php");
include("../library/session.php");
Session::checkSession();
?>
<style type="text/css">
    .list{
    margin: 40px;
}
.list table tr:first-child{
    background: #666;
    
}
.list table tr th,
.list table tr td{
    width: 2%;
    padding: 10px;
    text-align: center;
    border-bottom: 1px solid #DDD;
}
.list table tr td a{
    text-decoration: none;
    color: #000;
    font-weight: bold;
}
.list table tr td a:hover{
    text-decoration: underline;
}
</style>
<?php
$query = "SELECT post.id, post.title, post.author, category.name FROM post,category WHERE post.category = category.categoryID;";

$result = $db->query($query);
?>
            <div class="list">
                <table>
                    <tr>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Category</th>
                        <th>Action</th>
                    </tr>
<?php
while($value = $result->fetch_assoc()){
                    ?>
                    <tr>
                        <td><?php echo $value['title'];?></td>
                        <td><?php echo substr($value['author'],0,23);?></td>
                        <td><?php echo $value['name'];?></td>
                        <td>
                            <a target="blank" href="view-post.php?id=<?php echo $value['id'];?>">View</a>
<?php
if(Session::getSession('username') == $value['author']){
?>
                            ||
                            <a target="blank" href="edit-post.php?id=<?php echo $value['id'];?>">Edit</a> 
<?php
}
if(Session::getSession('userRole') == 1 ||Session::getSession('username') == $value['author']){
?>                            
                            || 
                            <a target="blank" onclick="return confirm('Are you sure want to delete this item?');" href="list-post.php?id=<?php echo $value['id'];?>">Delete</a>
<?php
    } 
?>
                        </td>
                    </tr>
<?php
}
?>
                </table>
            </div>