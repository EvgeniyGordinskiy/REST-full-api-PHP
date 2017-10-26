<?php
use \App\Services\Route\Route;
use \App\Services\Http\Request\Request;

if ( php_sapi_name() !== 'cli' ) {
	$request = (new Request())->server->getRequestTarget();
	$route = (new Route())->parseRoute($request);

	$isPermission = \App\Services\Permissions\Permission::checkPermissions($route['permission']);
	if ($isPermission) {
		Route::next($isPermission);
	}
}
