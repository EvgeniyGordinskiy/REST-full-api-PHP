<?php
use \App\Services\Route\Route;

define('SITE_ROOT', __DIR__);

$loader   = require_once __DIR__.'/vendor/autoload.php';

 $request  = (new \App\Services\Http\Request\Request())->server->getRequestTarget();
 $route    = (new Route())->parseRoute($request);
 $permissions = require_once SITE_ROOT.'/config/permissions.php';
 $checkPermissions = $permissions['auth']();

 if( $checkPermissions ) {
	 $file = explode('@',$route['obj'])[0];
	 $method = explode('@',$route['obj'])[1];

	 if (file_exists("App/".$request->version."/".$request->class . ".php")) {
		 $newClass = "App\\".$request->version."\\".$request->class;
		 new $newClass();
	 }
	 dump($route);
 }



if (file_exists("App/".$request->version."/".$request->class . ".php")) {
	$newClass = "App\\".$request->version."\\".$request->class;
	new $newClass();
}else{
	http_response_code(404);
}