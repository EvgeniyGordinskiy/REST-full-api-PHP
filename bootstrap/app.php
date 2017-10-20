<?php
use \App\Services\Route\Route;
use \App\Services\Http\Request\Request;

$request  = (new Request())->server->getRequestTarget();
$route    = (new Route())->parseRoute($request);
$isPermission = \App\Services\Permissions\Permission::checkPermissions($route['permission']);



//if( $checkPermissions ) {
//	$file = explode('@',$route['obj'])[0];
//	$method = explode('@',$route['obj'])[1];
//
//	if (file_exists(SITE_ROOT."/App/versions/v".$route['version']."/".$file . ".php")) {
//		$newClass = "App\\versions\\v".$route['version']."\\".$file;
//		$object = new $newClass();
//		if ( method_exists($object,$method) ) {
//			dump(call_user_func_array([$object, $method],[]));
//		}
//	}
//}