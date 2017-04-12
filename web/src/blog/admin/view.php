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
            <h2>View Message</h2>
            <div class="entry">
                <table>
<?php
$query = "SELECT * FROM contact WHERE id='$id';";
$result = $db->query($query);
if($result){
    while($value = $result->fetch_assoc()){
?>
                    <tr>
                        <td><label for="name">Name :</label></td>
                        <td><input type="text" name="name" value="<?php echo $value['name']; ?>" readonly ></td>
                    </tr>
                   <tr>
                        <td><label for="email">Email :</label></td>
                        <td><input type="text" name="email" value="<?php echo $value['email']; ?>" readonly ></td>
                    </tr>
                    <tr>
                        <td><label for="website">Website :</label></td>
                        <td><input type="text" name="website" value="<?php echo $value['website']; ?>" readonly ></td>
                    </tr>
                    <tr>
                        <td><label for="message">Message :</label></td>
                        <td>
                            <textarea name="message" rows="10" cols="100" readonly >
                                <?php echo $value['message']; ?>
                            </textarea>
                        </td>
                    </tr>

<?php
    }                                   
}
?>    
                </table>
            </div>
        </div>
<?php
include("include/footer.php");
?>