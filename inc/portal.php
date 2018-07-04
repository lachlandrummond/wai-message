<!-- ---------------------------------------
    File: portal.php processes all the information from login.php
    Project: Wai-Message
	Standard: AS2.43
    School: Waimea College
    Author: Lachlan Drummond
-------------------------------------------- -->

<div class="portal">
	<?php
		//this php checks the submitted username against the database,
		//then compares the salted and hashed password with the hash in the database.
		//if the hashes are the same, the passwords are the same and it can log in the user,
		//else it will show that the password was incorrect then redirect to the login page
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
<p class="copyright c-light">&copy; Lachlan Drummond 2018</p>