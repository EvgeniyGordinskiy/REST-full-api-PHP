<?php

use \App\Services\Http\Request\Request;

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
require  "../autoload.php";

function env($param =0)
{
	$default = parse_ini_file(".env");

	if ($param) {
		return isset($default[$param]) ? $default[$param] : false;
	}
	
	return false;
}

function config($param = false)
{

}




