<?php

define('SITE_ROOT', __DIR__);

function dd ($var = false) {
	ob_get_contents();
	if ($var) {
		dump($var);
	}
	//exit();
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

$loader   = require_once __DIR__.'/vendor/autoload.php';

$bootstrap = require_once __DIR__.'/bootstrap/app.php';



