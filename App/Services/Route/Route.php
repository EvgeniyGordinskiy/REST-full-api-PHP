<?php
namespace App\Services\Route;
use App\Services\Exceptions\BaseException;
use App\Services\Exceptions\RouteException;
use App\Services\Permissions\Permission;

class Route
{
    public $routes;
    private static $currentRoute;
	private $parentRoute;
	private $component;

    public function __construct()
    {
        $routes = require_once SITE_ROOT.'/App/routes.php';
	    foreach ($routes as $key => $route) {
		    $this->merge_routes($route, false, $key);
	    }
	    dd($this->routes);
    }

    private function merge_routes($routes, $child = false, $component = false)
    {
        if ( $component ) {
	        $this->component = $component;
        }
	    foreach ($routes as $key => $route) {
		    var_dump($key);
		    if ( is_array($route) && $key !== 'child' && $key !== 'permission' && !is_int($key) ) {
			    $route = $this->cleanRoutes($route, $key);
				$route['component'] = $this->component;
				if ( key_exists('child', $route) ) {
					if ( !$child ) {
						$this->parentRoute = $route;
						$this->parentRoute['key'] = $key;
					} else {
						$this->parentRoute['key'] .= $key;
						$route['permission'] = array_replace([$route['permission']], $this->parentRoute);
					}
					$childRoute = $route['child'];
					unset($route['child']);
					$this->routes[$this->parentRoute['key']] = $route;
					$this->merge_routes($childRoute, true);
				} else {
					$this->routes[$this->parentRoute['key'].$key] = $route;
				}
		    }
	    }
    }

	private function cleanRoutes(array $route, $key)
	{
			$newRoute = [];

			$newURL = preg_replace(['/{(.*?)}/', '/\//'], ['[a-zA-Z0-9]+', '\/'] ,$key);
			/*
             Check obj syntax
			*/
			if ( !preg_match('/^(\w+)@(\w+)$/', $route['obj']) ) {
				throw new RouteException("Wrong syntax routes object in the route: '$key'");
			}
			/*
             Check version syntax
			*/
			if ( !isset($route['version']) ) {
				$route['version'] = '';
			} elseif ( !is_int($route['version']) && !is_float($route['version']) ) {
				throw new RouteException("Wrong syntax routes version in the route: '$key'");
			}
			/*
			  Check filters syntax
			 */
			if (!isset($route['filter']) ) {
				$route['filter'] = '';
			}   elseif ( !preg_match('/^(\w+)$/', $route['filter']) ) {
				throw new RouteException("Wrong syntax routes filter in the route: '$key'");
			}
			/*
			  If permission is empty, create empty array
			  If permission is not string or array throw RouteExeption.
			  Else create array with this string.
			*/
			if ( !isset($route['permission']) ) {
				$route['permission'] = [];
			} elseif ( !is_array($route['permission']) ) {
				if ( !is_string($route['permission']) ) {
					throw new RouteException("Permission must be instance string or array in the route: '$key'");
				}
				if ( !preg_match('/^(\w+)$/', $route['permission']) ) {
					throw new RouteException("Wrong syntax routes permission. in the route: '$key'");
				}

				$route['permission'] = [$route['permission']];
			} else {
				foreach ( $route['permission'] as $permission ) {
					if ( !preg_match('/^(\w+)$/', $permission) ) {
						throw new RouteException("Wrong syntax routes permission. in the route: '$key'");
					}
				}
			}

			$newRoute["$newURL"] = $route;
			return $newRoute;
	}

    public function parseRoute($route)
    {
	    if ( array_key_exists($route, $this->routes) ) {
		    self::$currentRoute = $this->routes[$route];
		    return $this->routes[$route];
		} else {
			try {
				$cleanRoutes = $this->routes;
				$route = preg_replace('/[^a-zA-Z0-9\/_-]+/', '', $route);
				foreach ($cleanRoutes as $pattern => $value) {
					if ( preg_match("/$pattern$/i", $route) ) {
						$value['pattern'] = $pattern;
						self::$currentRoute = $value;
						return $value;
					}
				}
				throw new RouteException('Route not found');
			} catch (\Exception $e) {
			}
		}
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