<!-- ---------------------------------------
    File: page.php handles all the page requests, making sure only valid pages are requested
    Project: Wai-Message
	Standard: AS2.43
    School: Waimea College
    Author: Lachlan Drummond
-------------------------------------------- -->

<?php
	//it tells itself where the pages to include are and if the requested page
	//is not one of them it redirects to the homepage (acting as the 404)
	$path = dirname(__FILE__);
	if(empty($_GET['page']) || in_array("{$_GET['page']}.php", scandir("{$path}")) == false){
		header('Location: index.php?page=home');
	};
	$include = "{$path}/{$_GET['page']}.php";
?>
