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

require  "../init.php";






