<!-- ---------------------------------------
    File: adding.php processes the add request and redirects to their chat
    Project: Wai-Message
	Standard: AS2.43
    School: Waimea College
    Author: Lachlan Drummond
-------------------------------------------- -->  

<?php
	// gets the intended add recipient and redirects to their chat
	$add = $_POST['add'];
	header('Location: ?page=msg&msg='.$add);
?>