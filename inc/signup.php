<div class="signup">
	<div class="signup-header">
		<a href="?page=home" class="signup-header-back"><i class="material-icons signup-header-back-icon">arrow_back_ios</i><span class="signup-header-back-text">Back</span></a>
		<h2 class="signup-header-head">Sign Up</h2>
		<span class="signup-header-accent"></span>
	</div>
	<form class="signup-form" action="?page=signing" method="post">
		<div class="signup-name signup-input-container">
			<label for="name">Name:</label>
			<input class="signup-input" type="text" name="name" pattern="[A-Za-z ]{4,}" maxlength="30" required autofocus>
		</div>
		<i><p class="signup-input-sub">4 - 30 characters, a-z, caps and spaces allowed</p></i>
		<div class="signup-username signup-input-container">
			<label for="username">Username:</label>
			<input class="signup-input" type="text" name="username" pattern="[a-z0-9.-]{4,}" maxlength="30" required>
		</div>
		<i><p class="signup-input-sub">4 - 30 characters, a-z, 0-9, dots and dashes, no caps or spaces</p></i>
		<div class="signup-password signup-input-container">
			<label for="password">Password:</label>
			<input class="signup-input" type="password" name="password" pattern="{8,}" maxlength="50" required>
		</div>
		<i><p class="signup-input-sub">8 - 50 characters, no spaces</p></i>
		<div class="signup-submit">
			<input class="signup-submit-btn" type="submit" value="Sign Up">
			<p class="signup-submit-login">Already have an account? <a href="?page=login" class="signup-login" >Log In</a></p>
		</div>
	</form>
</div>
<p class="copyright c-light">&copy; Lachlan Drummond 2018</p>