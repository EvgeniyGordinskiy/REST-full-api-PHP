<?php

function dd ($var = false) {
	if (!is_string($var)) {
		(new App\Services\Http\Response\Response())->send(json_encode($var));
	}else{
		(new App\Services\Http\Response\Response())->send($var);
	}
	exit();
}

function env($param =0)
{
	$default = parse_ini_file(SITE_ROOT."/.env");
	if ($param) {
		return isset($default[$param]) ? $default[$param] : false;
	}
	return false;
}

function config($file, $param = false)
{
	if ( $configs = require SITE_ROOT."/config/$file.php" ) {
		if ( $param ) {
			return $configs[$param];
		}
		return $configs;
	}

	return false;
}