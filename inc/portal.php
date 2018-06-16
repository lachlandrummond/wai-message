<div class="portal">
	<?php
		error_reporting(0);
		require_once('db-connect.php');
		$login_username = $_POST['login_username'];
		$login_password = $_POST['login_password'];
		$statement = mysqli_prepare( $link, "SELECT username, name, hash, salt FROM users WHERE username='$login_username'" );
		if( $statement ){
			mysqli_stmt_bind_param($statement, 's', $login_username);
			mysqli_stmt_execute($statement);
			mysqli_stmt_bind_result($statement, $username, $name, $hash, $salt);
			if( mysqli_stmt_fetch($statement)){
				if(hash('sha256', $login_password.$salt) == $hash ){
					$_SESSION["username"] = $username;
					$_SESSION["name"] = $name;
					header('Location: ?page=board');
				} else {
					print '<p class="portal-error">Incorrect password!</p>';
					header('refresh:5;url=?page=login');
				}
			} else {
				print '<p class="portal-error">Unknown user!</p>';
				header('refresh:5;url=?page=login');
			}
			mysqli_stmt_close( $statement );
		}
		mysqli_close( $link );
	?>
</div>