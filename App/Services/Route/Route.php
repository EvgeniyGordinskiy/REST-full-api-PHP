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
	private $component;

    public function __construct()
    {
        $routes = require_once SITE_ROOT.'/App/routes.php';
	    foreach ($routes as $key => $route) {
		    $this->merge_routes($route, false, $key);
	    }
    }

    private function merge_routes($routes, $child = false, $component = false) {
        if ( $component ) {
	        $this->component = $component;
        }
	    foreach ($routes as $key => $route) {
		    if ( is_array($route) ) {
				if ($key !== 'child' && $key !== 'permission' && !is_int($key)) {
					$route['component'] = $this->component;
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
						$value['pattern'] = $pattern;
						self::$currentRoute = $value;
						return $value;
					}
				}
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
				try {
					$newClass = 'App\\versions\\v' . self::$currentRoute['version'] ."\\". self::$currentRoute['component'] . '\\controllers\\' . $file;
					$object = new $newClass();
					call_user_func_array([$object, $method], []);
				}catch (\Exception $e) {
					throw new BaseException($e->getMessage());
				}
		}
    }
}