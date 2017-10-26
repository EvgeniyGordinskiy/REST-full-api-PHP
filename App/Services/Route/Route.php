<?php
namespace App\Services\Route;
use App\Services\Exceptions\BaseException;
use App\Services\Exceptions\NotFoundRouteException;
use App\Services\Permissions\Permission;

class Route
{
    public $routes;
    private static $currentRoute;
	private $parentKey;
    public function __construct()
    {
        $routes = require_once SITE_ROOT.'/App/routes.php';
	   $this->merge_routes($routes);
	    dd($this->routes);

    }

    private function merge_routes($routes, $child = false) {
	    foreach ($routes as $key => $route) {
		    if ( is_array($route) ) {
				if ($key !== 'child' && $key !== 'permission' && !is_int($key)) {
					if ( key_exists('child', $route) ) {
						if ( $child ) {
							$this->parentKey .= $key;
						} else {
							$this->parentKey = $key;
						}
						$child = $route['child'];
						unset($route['child']);
						$this->routes[$this->parentKey] = $route;
						$this->merge_routes($child, true);
					} else {
							$this->routes[$this->parentKey.$key] = $route;
					}
				}
			    $this->merge_routes($route);
		    }
	    }
    }

    public function parseRoute($route)
    {
	    if ( array_key_exists($route, $this->routes) ) {
		    self::$currentRoute = $this->routes[$route];
		    return $this->routes[$route];
		} else {
			try {
				$cleanRoutes = $this->cleanRoutes($this->routes);
				$route = preg_replace('/[^a-zA-Z0-9\/_-]+/', '', $route);
				foreach ($cleanRoutes as $pattern => $value) {
					if ( preg_match("/$pattern$/i", $route) ) {
						self::$currentRoute = $value;
						return $value;
					}
				}
				//dd();
				throw new NotFoundRouteException('Route not found');

			} catch (\Exception $e) {
			}

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
				$file = strstr(self::$currentRoute['obj'], '@', true);
				$method = substr(strstr(self::$currentRoute['obj'], '@'), 1);
  		      //  $pathToFile = config('app','controller_path').self::$currentRoute['version'].DIRECTORY_SEPARATOR.'controllers'.DIRECTORY_SEPARATOR.$file . ".php";
				try {
					$newClass = 'App\\versions\\v' . self::$currentRoute['version'] . '\\controllers\\' . $file;
					$object = new $newClass();
					call_user_func_array([$object, $method], []);
				}catch (\Exception $e) {
					throw new BaseException($e->getMessage());
				}
		}
    }
}