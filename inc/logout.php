<?php
    print '<h2>Logging out '.$_SESSION["name"].'</h2>';
    unset($_SESSION["username"]);
    unset($_SESSION["name"]);
    print '<p>You have successfully logged out.</p>';
    print '<a href="?page=login">Login</a>';
    print '<a href="?page=home">Home</a>';
?>
