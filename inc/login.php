<!-- ---------------------------------------
    File: login.php is the login form that gets sent to portal.php
    Project: Wai-Message
	Standard: AS2.43
    School: Waimea College
    Author: Lachlan Drummond
-------------------------------------------- -->  

<?php
	//checks to see if the user is logged in,
	//they shouldn't be able to access the login
	//page if they are already logged in
	if($logged_in){
		header('Location: ?page=board');
	}
?>
<div class="login">
	<div class="login-header">
		<a href="?page=home" class="login-header-back"><i class="material-icons login-header-back-icon">arrow_back_ios</i><span class="login-header-back-text">Back</span></a>
		<h2 class="login-header-head">Login</h2>
		<span class="login-header-accent"></span>
	</div>
	<form class="login-form" action="?page=portal" method="post">
		<div class="login-username login-input-container">
			<label for="login_username">Username:</label>
			<input class="login-input" type="text" name="login_username" maxlength="30" required autofocus>
		</div>
		<div class="login-password login-input-container">
			<label for="login_password">Password:</label>
			<input class="login-input" type="password" name="login_password" maxlength="50" required>
		</div>
		<div class="login-submit">
			<input class="login-submit-btn" type="submit" value="Login">
			<p class="login-submit-signup">No account? <a href="?page=signup" class="login-signup">Sign Up</a></p>
		</div>
	</form>
</div>
<p class="copyright c-light">&copy; Lachlan Drummond 2018</p>