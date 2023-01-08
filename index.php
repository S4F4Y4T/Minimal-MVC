<?php
	switch (ENVIRONMENT) {
		case 'production':
			ini_set('error_reporting', 0);
			break;
		default:
			ini_set('display_errors', '1');
			ini_set('display_startup_errors', '1');
			error_reporting(E_ALL);
			break;
	}

	require"app/config/config.php";

	spl_autoload_register(function($class){
		require"system/lib/".$class.".php";
	});
	
	$index = new Main();

	
	
	
?>
