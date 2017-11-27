<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

use App\Services\Log\Log;
set_error_handler(function( $num, $str, $file, $line, $context ) {

	// Catch notices and warnings
	if ($num === 8 || $num === 2) {
		new Log(false, $str, $file, $line);
	}

	return false;
});

if ( isset($_SERVER['CONTENT_TYPE']) && (preg_match('/application\/json/', $_SERVER['CONTENT_TYPE']) === 1)) {
	require  "../init.php";
} else {
	$page = file_get_contents('Frontend/index.html');
	echo $page;
}






