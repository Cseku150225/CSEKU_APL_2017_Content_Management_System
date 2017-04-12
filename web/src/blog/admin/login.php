<?php
include("../library/session.php");
Session::startSession();
include("../config/config.php");
include("../library/database.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Log In</title>
	<link rel="stylesheet" href="css/login-stylesheet.css">
</head>
<body>
	<div class="log-in">
<?php
	if(!empty($_POST)){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$query = "SELECT * FROM user_info WHERE username='$username' AND password='$password';";
		$result = $db->query($query);
		$value = $result->fetch_assoc();
		$row = $result->num_rows;
		
		if(!empty($value)){
			if($row > 0){
				Session::setSession('login',true);
				Session::setSession('userID',$value['userID']);
				Session::setSession('username',$value['username']);
				Session::setSession('userRole',$value['role']);
				header('Location: default.php');
			}
		}
		else{
			echo "<span style='color: red;font-size: 20px;padding: 10px 60px;'>username or password is incorrect</span>";
		}	
	}
?>
		<h2>Log In</h2>
		<form method="POST" action="login.php">
			<table>
				<tr>
					<td><input type="text" name="username" placeholder="username"></td>
				</tr>
				<tr>
					<td><input type="password" name="password" placeholder="password"></td>
				</tr>
				<tr>
					<td><input type="submit" name="login" value="log in"></td>
				</tr>
			</table>
		</form>
	</div>
</body>
</html>


