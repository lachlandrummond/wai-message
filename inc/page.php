<?php
$path = dirname(__FILE__);
if(empty($_GET['page']) || in_array("{$_GET['page']}.php", scandir("{$path}")) == false){
	header('Location: index.php?page=home');
};
$include = "{$path}/{$_GET['page']}.php";
?>
