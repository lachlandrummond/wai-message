<div class="home">
	<header class="home-header">
		<a href="?page=home" class="home-header-logo"><img src="imgs/logo.svg" class="home-header-logo-img"></a>
		<nav class="home-nav">
			<?php
				if(isset($_SESSION['username']) && isset($_SESSION['name'])){
					print '<div class="home-nav-user">';
					print '    <span class="home-nav-user-name">'.$_SESSION['name'].'</span>';
					print '    <a href="?page=logout" class="home-nav-user-logout"><i class="material-icons home-nav-user-logout-icon">input</i><span class="home-nav-user-logout-text">Logout</span></a>';
					print '</div>';
				} else {
					print '<a href="?page=signup" class="home-nav-signup">Sign Up</a>';
					print '<a href="?page=login" class="home-nav-login">Login</a>';
				}
			?>
		</nav>
	</header>
	<main class="home-main">
		<h3 class="home-main-text">Connect with other students<br>at a click of a button!</h3>
		<a href="?page=signup" class="home-main-cta">
			<?php
				if(isset($_SESSION['username']) && isset($_SESSION['name'])){
					print '<a href="?page=board" class="home-main-cta">';
					print '    Your Board';
					print '</a>';
				} else {
					print '<a href="?page=signup" class="home-main-cta">';
					print '    Sign Up';
					print '</a>';
				}
			?>
		</a>
	</main>
</div>
<p class="copyright-s c-light">&copy; Lachlan Drummond 2018</p>