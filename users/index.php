<?php 	
	define('ROOT_PATH', dirname(dirname(__FILE__)));
	require(ROOT_PATH.'/helpers.php');
	$action = isset($_GET['action'])?$_GET['action']:'list';
	// $route = $_GET['route'];
	if(file_exists($action . '.php'))
	{
		require($action . '.php');
		die();
	}
	echo "Not founded!";