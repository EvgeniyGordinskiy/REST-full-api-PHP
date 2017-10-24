<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

set_error_handler(function( $num, $str, $file, $line, $context ) {

	if ($num === 8 || $num === 2) {
		new \App\Services\Log\Log(false, $str, $file, $line);
	}

	return false;
});

require  "../autoload.php";

function env($param =0)
{
	$default = parse_ini_file("../.env");
	if ($param) {
		return isset($default[$param]) ? $default[$param] : false;
	}
	return false;
}

function config($file, $param = false)
{
  if ( $configs = require_once SITE_ROOT."/config/$file.php" ) {
	if ( $param ) {
		return $configs[$param];
	}
	return $configs;
  }

  return false;
}




