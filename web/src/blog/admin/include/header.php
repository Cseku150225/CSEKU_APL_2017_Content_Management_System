<?php
error_reporting(0);
include("../config/config.php");
include("../library/database.php");
include("../library/function.php");
include("../library/session.php");
Session::checkSession();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Panel</title>
    <link rel="stylesheet" href="css/stylesheet.css">
</head>
<body>
	<div class="header">
		<div class="logo">
            <img src="image/logo.png" alt="Logo"/>
            <h1>Website Title</h1>
            <p>website description</p>
        </div>
		<div class="user">
			<ul>
				<li><a href="user-profile.php"><?php echo Session::getSession('username');?></a></li>
				<li><a href="logout.php">logout</a></li>
			</ul>
		</div>
	</div>
	<div class="menu">
		<ul>
			<li><a href="default.php">Dashboard</a></li>
            <li><a href="inbox.php">Inbox</a></li>
			<li><a href="user-profile.php">User Profile</a></li>
			<li><a href="change-password.php">Change Password</a></li>
			<li><a href="list-user.php">User List</a></li>
<?php 
if(SEssion::getSession('userRole') == 1){
	echo "<li><a href=\"add-user.php\">Add User</a></li>";
}
?>
			
		</ul>
	</div>