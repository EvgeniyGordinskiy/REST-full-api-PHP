<?php
use \App\Services\Route\Route;
use \App\Services\Http\Request\Request;

$request = new Request();
$query = $request->server->getRequestTarget();
$method = $request->server->getMethod();
$router = Route::create();

if ( $currentRoute = $router->parseRoute($query, $method) ) {
	$HasPermission = \App\Services\Permissions\Permission::checkPermissions($currentRoute);
} else {
	throw new \App\Services\Exceptions\RouteException('Route not found', 404);
}

if ( $HasPermission ) {
	$router::handle($HasPermission);
} else {
	throw  new \App\Services\Exceptions\PermissionException('You do not have permissions', 403);
}

