<?php
    $link = new mysqli('localhost', 'YOUR_PHPMYADMIN_USERNAME', 'YOUR_PHPMYADMIN_PASSWORD', 'YOUR_PHPMYADMIN_DATABASE');
    if($link->connect_errno) {
        die('Could not connect to DB:'.$link->connect_error);
    }
?>
