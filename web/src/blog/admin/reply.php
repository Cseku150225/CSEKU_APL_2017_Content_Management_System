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
<?php
if(isset($_POST['submit'])){
    $to = $_POST['to'];
    $from = $_POST['from'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    
    $result = mail($to, $subject, $message, $from);
    
    if($result){
        echo "<span class='success'>message sent successfully.</span>";
    }
    else{
        echo "<span class='error'>message sent failed.</span>";
    }
}
?>
            <div class="entry">
                <form action="" method="POST">
                    <table>
<?php
$query = "SELECT email FROM contact WHERE id='$id';";
$result = $db->query($query);
if($result){
    $value = $result->fetch_assoc()
?>
                        <tr>
                            <td><label for="to">To :</label></td>
                            <td><input type="text" name="to" value="<?php echo $value['email']; ?>" readonly ></td>
                        </tr>
                       <tr>
                            <td><label for="from">From :</label></td>
                            <td><input type="text" name="from" ></td>
                        </tr>
                        <tr>
                            <td><label for="subject">Subject :</label></td>
                            <td><input type="text" name="subject"></td>
                        </tr>
                        <tr>
                            <td><label for="message">Message :</label></td>
                            <td>
                                <textarea name="message" rows="10" cols="100">
                                </textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>
                                <input type="submit" name="submit" value="Send">
                            </td>
                        </tr>

<?php                                  
}
?>    
                    </table>
                </form>
            </div>
        </div>
<?php
include("include/footer.php");
?>