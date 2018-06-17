<div class="signing">
	<?php
		require_once('db-connect.php');
		$name = $_POST['name'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$name = strip_tags($name);
		$username = strip_tags($username);
		$sql = "SELECT username FROM users WHERE username = '$username'";
		$check = mysqli_query($link, $sql);
		if(mysqli_num_rows($check) > 0){
			print '<p class="signing-error">Username has been taken!</p>';
			header('refresh:5;url=?page=signup');
		} else {
			$salt = md5(microtime(true)*100000);
			$hash = hash('sha256', $password.$salt);
			$statement = mysqli_prepare( $link, "INSERT INTO users (name, username, hash, salt) VALUES (?, ?, ?, ?)");
			if( $statement ){
				mysqli_stmt_bind_param($statement, 'ssss', $name, $username, $hash, $salt);
				mysqli_stmt_execute($statement);
				mysqli_stmt_bind_result($statement);
				mysqli_stmt_close($statement);
				$_SESSION['username'] = $username;
				$_SESSION['name'] = $name;
				header('Location: ?page=board');
			}
		}
		mysqli_close($link);
	?>
</div>