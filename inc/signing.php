<!-- ---------------------------------------
    File: signing.php processes all the information from signup.php
    Project: Wai-Message
	Standard: AS2.43
    School: Waimea College
    Author: Lachlan Drummond
-------------------------------------------- -->

<?php
	//checks to see if the user is logged in,
	//they shouldn't be able to access the signing
	//page if they are already logged in
	if($logged_in){
		header('Location: ?page=board');
	}
?>
<div class="signing">
	<?php
		//this PHP checks to see whether the username has already been taken,
		//if it is, it shows that it is taken and redirects to the signup form again
		//if the username is unique it will salt and hash the password and insert the
		//data into the database as a new user
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
<p class="copyright c-light">&copy; Lachlan Drummond 2018</p>