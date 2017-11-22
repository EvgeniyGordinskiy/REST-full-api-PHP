<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

set_error_handler(function( $num, $str, $file, $line, $context ) {

	// Catch notices and warnings
	if ($num === 8 || $num === 2) {
		new \App\Services\Log\Log(false, $str, $file, $line);
	}

	return false;
});
$page = file_get_contents('Frontend/index.html');
echo $page;
if ( isset($_SERVER['HTTP_X_REQUESTED_WITH']) ) {
	require  "../init.php";
}






