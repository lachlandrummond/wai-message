<?php
 	include('inc/page.php');
	session_name('waisession');
	session_start();
	if(isset($_SESSION['username']) && isset($_SESSION['name'])){
		$username = $_SESSION['username'];
		$name = $_SESSION['name'];
		$logged_in = true;
	} else {
		$logged_in = false;
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="icon" href="imgs/logo.ico">
		<link rel="stylesheet" href="styles/main.css">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<title>Wai-Message</title>
	</head>
	<body>
		<div class="page-container">
			<?php
				include($include);
			?>
		</div>
	</body>
</html>
