<?php
require  "../autoload.php";


function env($param =0)
{
	$default = parse_ini_file(".env");

	if ($param) {
		return isset($default[$param]) ? $default[$param] : false;
	}
	
	return false;
}




