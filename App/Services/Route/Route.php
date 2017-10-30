<?php
namespace App\Services\Route;
use App\Services\Exceptions\BaseException;
use App\Services\Exceptions\RouteException;
use App\Services\Permissions\Permission;
use App\Services\Route\Routes_filter\Filter;

class Route
{

    public $routes;
	private $filter;
    private static $currentRoute;
	private $parentRoute;
	private $component;

    public function __construct()
    {
	    $routes = require_once config('app', 'app_routes');
	    $this->filter = new Filter();
	    foreach ($routes['app']['child'] as $key => $route) {
		    if ( !preg_match('/_component/', $key) ) {
			    if ( isset($route['permission']) ) {
				    $this->parentRoute['permission'] = $this->filter->permission($route['permission']);
			    } else {
				    $this->parentRoute['permission'] = [];
			    }
			    if ( isset($route['child']) ) {
				    $this->merge_routes($route['child'], false);
			    }
			    continue;
		    }
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
		    if ( !isset($route['obj']) && !isset($route['child']) ) {
			    $this->merge_routes($route, false, $key);
			   continue;
		    }

		    $this->filter->transform($route, $key);
		    if ( !$route['permission'] ) {
			    $route['permission'] = [];
		    }
			$route['component'] = $this->component;

			if ( key_exists('child', $route) ) {

				if ( !$child ) {
					$route['permission']             = array_unique(array_merge($route['permission'], $this->parentRoute['permission']));
					$this->parentRoute               = $route;
					$this->parentRoute['key']        = $key;
				} else {
					$this->parentRoute['key']       .= $key;
					$this->parentRoute['permission'] = array_unique(array_merge($route['permission'], $this->parentRoute['permission']));
					$route['permission']             = $this->parentRoute['permission'];
				}

				$childRoute = $route['child'];
				unset($route['child']);
				$this->routes[$this->parentRoute['key']] = $route;
				$this->merge_routes($childRoute, true);
			} else {
				$route['permission'] = array_unique(array_merge($route['permission'], $this->parentRoute['permission']));
				$this->routes[$this->parentRoute['key'].$key] = $route;
			}
	    }
    }

    public function parseRoute($route)
    {
	    $route = preg_replace(['/[^a-zA-Z0-9\/_-]+/', '/\//'], ['', '\/'], $route);

	    if ( array_key_exists($route, $this->routes) ) {
		    self::$currentRoute = $this->routes[$route];
		    return $this->routes[$route];
		} else {
			try {
				$cleanRoutes = $this->routes;
				foreach ($cleanRoutes as $pattern => $value) {
					if ( preg_match("/^$pattern$/i", $route) ) {
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