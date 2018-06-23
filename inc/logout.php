<div class="logout">
    <?php
        error_reporting(0);
        print '<h2>Logging out '.$_SESSION["username"].'</h2>';
        unset($_SESSION["username"]);
        unset($_SESSION["name"]);
        print '<p class="logout-success">You have successfully logged out.</p>';
        print '<div class="logout-nav">';
        print '    <a href="?page=home" class="logout-home">Home</a>';
        print '    <a href="?page=login" class="logout-login">Login</a>';
        print '<div>';
    ?>
</div>
<p class="copyright c-light">&copy; Lachlan Drummond 2018</p>
