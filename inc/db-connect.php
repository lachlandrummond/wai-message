<!-- ---------------------------------------
    File: db-connect.php holds the database information so
            that when $link is called the database can connect
    Project: Wai-Message
	Standard: AS2.43
    School: Waimea College
    Author: Lachlan Drummond
-------------------------------------------- -->

<?php
    // establishes a new MySQL link with the server for getting or inserting data
    $link = new mysqli('localhost', 'lmdrummond_db', 'paT', 'lmdrummond_waimessage');
    // error message if it couldn't connect
    if($link->connect_errno) {
        die('Could not connect to DB:'.$link->connect_error);
    }
?>