<?php
include("include/header.php");
include("config/config.php");
include("library/database.php");
include("library/function.php");
?>
<!-- #end navigation -->
    <div id="page" class="overflow">
        <div id="content" class="overflow">
            <h1>Contact Us</h1>
<?php
if(!empty($_POST)){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $website = $_POST['website'];
    $message = $_POST['message'];

    $query = "INSERT INTO contact(name, email, website, message) VALUES('$name', '$email', '$website', '$message');";
    $result = $db->query($query);
    if(!empty($result)){
        echo "<span class='success'>message sent succussfully.</span>";
    }
    else{
        echo "<span class='error'>message could not be sent.</span>";
    }
}
?>
            <form method="POST" action="contact.php">
                <table>
                    <tr>
                        <td ><label for="name">Name</label></td>
                        <td><input type="text" name="name" required="1" placeholder="Name"/></td>
                    </tr>
                    <tr>
                        <td><label for="email">E-mail</label></td>
                        <td><input type="text" name="email" required="1" placeholder="Email"/></td>
                    </tr>
                    <tr>
                        <td><label for="website">Website</label></td>
                        <td><input type="text" name="website" placeholder="Website"/></td>
                    </tr>
                    <tr>
                        <td><label for="message">Message</label></td>
                        <td><textarea name="message" required="1" placeholder="Type your message here" rows="16"></textarea></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td><input type="submit" name="send" value="Send"></td>
                    </tr>
                </table>
            </form>  
        </div>
<!-- #end content -->
<?php
include("include/sidebar.php");
include("include/footer.php");
?>