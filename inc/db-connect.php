<?php
    $link = new mysqli('localhost', 'lmdrummond_db', 'paT', 'lmdrummond_waimessage');
    if($link->connect_errno) {
        die('Could not connect to DB:'.$link->connect_error);
    }
?>