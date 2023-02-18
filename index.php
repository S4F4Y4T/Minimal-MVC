<?php

	define("BASEPATH", "http://personal.vh/S4F4Y4T-Framework");
	define("ENVIRONMENT","development");

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

	$autoload_library = ['session', 'database'];

	require"app/config/config.php";

	//autoload core functionalities
	spl_autoload_register(function($class){
		require"system/core/".$class.".php";
	});

	//autoload core libraries
	foreach ($autoload_library as $library){
		require"system/lib/".ucfirst($library).".php";
	}
	
	$index = new Main();

	
	
	
?>
