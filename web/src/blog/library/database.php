<?php
	$localhost = DB_HOST;
	$username = DB_USERNAME;
	$password = DB_PASSWORD;
	$db_name = DB_NAME;
	
	$db = new mysqli($localhost, $username, $password, $db_name);
	if(mysqli_connect_error()){
		die("Database connection failed.".mysqli_connect_errno());
	}
?>
