<?php
namespace App\Services\Route;
use App\Services\Exceptions\FileException;
use App\Services\Exceptions\NotFoundRouteException;
use App\Services\Permissions\Permission;

class Route
{
    public $routes;
    private static $currentRoute;
    public function __construct()
    {
        $this->routes = require_once SITE_ROOT.'/App/routes.php';
    }

    public function parseRoute($route)
    {
	    if ( array_key_exists($route, $this->routes) ) {
		    self::$currentRoute = $this->routes[$route];
		    return $this->routes[$route];
		} else {
             $cleanRoutes = $this->cleanRoutes($this->routes);
			 $route = preg_replace('/[^a-zA-Z0-9\/_-]+/', '', $route);
			foreach ($cleanRoutes as $pattern => $value) {
				 if ( preg_match("/$pattern$/i", $route) ) {
					 self::$currentRoute = $value;
					 return $value;
				 }
			 }
			 throw new NotFoundRouteException();
		}
    }

    private function cleanRoutes($routes)
    {
	    if( is_array($routes) ) {
		    $newRoutes = [];
		    foreach($routes as $key => $route) {
			    $new = preg_replace(['/{(.*?)}/', '/\//'], ['[a-zA-Z0-9]+', '\/'] ,$key);
			    $newRoutes["$new"] = $route;
		    }
		    return $newRoutes;
	    }
	    return false;
    }

    public static function next (Permission $permission)
    {
		if ( $permission->isPermissions() ) {
				$file = explode('@',self::$currentRoute['obj'])[0];
				$method = explode('@',self::$currentRoute['obj'])[1];

				if (file_exists(SITE_ROOT."/App/versions/v".self::$currentRoute['version']."/".$file . ".php")) {
					$newClass = "App\\versions\\v".self::$currentRoute['version']."\\".$file;
					$object = new $newClass();
					if ( method_exists($object,$method) ) {
						dump(call_user_func_array([$object, $method],[]));
					}
				}
		}
    }
}