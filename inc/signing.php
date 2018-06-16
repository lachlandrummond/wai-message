<?php
	require_once('db-connect.php');
	$name = $_POST['name'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$name = strip_tags($name);
	$username = strip_tags($username);
	$sql = "SELECT COUNT(username) FROM users WHERE username = '.$username'";
	$check = mysqli_query($link, $sql);
	$result = mysqli_fetch_assoc($check);
	print($result['']);
	/*if($check < 0){
		print 'Username has already been taken';
	}
	$salt = md5(microtime(true)*100000);
	$hash = hash('sha256', $password.$salt);
	$statement = mysqli_prepare( $link, "INSERT INTO users (name, username, hash, salt) VALUES (?, ?, ?, ?)");
	if( $statement ){
		mysqli_stmt_bind_param($statement, 'ssss', $name, $username, $hash, $salt);
		mysqli_stmt_execute($statement);
		mysqli_stmt_bind_result($statement);
		print 'User successfully added...';
		header('Location: ?page=board');
	};*/
	mysqli_close($link);
?>