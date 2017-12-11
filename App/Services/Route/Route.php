<?php
namespace App\Services\Route;
use App\Services\Exceptions\BaseException;
use App\Services\Exceptions\FilterException;
use App\Services\Exceptions\RouteException;
use App\Services\Filter\IFilter;
use App\Services\Http\Request\Request;
use App\Services\Http\Response\Response;
use App\Services\Permissions\Permission;
use App\Services\Route\Routes_filter\Filter;

class Route
{

	public $routes;
	private $filter;
	private $parentRoute;
	private $parentChild;
	private $parentPermission;
	private static $_state;
	public static $currentRoute;
	public static $all_routes;


    private function __construct()
    {
		$routes = require_once config('app', 'app_routes');
		$this->filter = new Filter();
		foreach ($routes as $route) {
			$this->parentRoute = '';
			$this->merge_routes($route, true);
		}
		self::$all_routes = $this->routes;
    }

	public static function create()
    {
		return self::getState();
    }

	/**
	 * If !self::$_state,
	 * creating new instance of the connect current Data Base and create new self.
	 */
	private static function getState()
	{
		if (!self::$_state) {
			self::$_state =	new self();
		}
		return self::$_state;
	}

	/**
	 *  Create array of all routes
	 * @param $route
	 * @param array $parent
	 */
    private function merge_routes($route, $parent = [])
    {

		$this->filter->transform($route);

	    if ( $parent ) {
		    $this->parentChild = $route['child'] ?? [];
		    $this->parentPermission = $route['permission'];
	    }

	    if ( !$route['permission'] ) {
		    $route['permission'] = [];
	    } elseif ( !isset($this->parentRoute['permission']) ) {
		    $this->parentRoute['permission'] = $route['permission'];
	    };

	    if ( isset($route['permission']) &&  isset($this->parentRoute['permission']) ) {
		    $route['permission'] =  $this->parentRoute['permission'] = array_unique(array_merge($this->parentRoute['permission'], $route['permission']));
	    }

	    if ( isset($this->parentChild[0]) && $route['path'] === $this->filter->url($this->parentChild[0]['path']) ) {
		    $route['permission'] = $this->parentPermission;
		    $this->parentRoute = $route;
		    $url = $this->parentRoute['path'];

//			$this->routes[$url] = $this->parentRoute;
		    array_shift($this->parentChild);
	    } elseif ( $route['path'] && $route['obj'] ) {

			$this->parentRoute['path'] = $url =isset($this->parentRoute['path'])?$this->parentRoute['path'].$route['path']:$route['path'];
			$component = $route['component'] ?? $this->parentRoute['component'] ?? '';
			$desc = $route['desc'] ?? '';
			$method = $route['method'] ?? '';
			$filter = $route['filter'] ?? '';
			$object = $route['obj'] ?? '';
			$version = $route['version'] ?? '';
		    $path = $this->parentRoute['path'] ?? '';
		    $permission = $this->parentRoute['permission'] ?? '';
//			$this->routes[$url] = $this->parentRoute;
			$this->routes[$url]['component'] = $component;
			$this->routes[$url]['desc'] = $desc;
			$this->routes[$url]['method'] = $method;
			$this->routes[$url]['filter'] = $filter;
			$this->routes[$url]['obj'] = $object;
			$this->routes[$url]['version'] = $version;
			$this->routes[$url]['permission'] = $permission;
			$this->routes[$url]['path'] = $path;
			$this->routes[$url]['api_path'] = stripslashes($path);
		}

		if ( key_exists('child', $route) ) {

			if ( isset($url) ) {
				unset($this->routes[$url]['child']);
			}

			foreach ($route['child'] as $key => $child) {
				$this->merge_routes($child);
			}
		}else{
			$position_last_slash = strripos($this->parentRoute['path'],'\/');
			$this->parentRoute['path'] = substr($this->parentRoute['path'],0, $position_last_slash);
		}
    }

    public function parseRoute($route, $method)
    {
	    $route = preg_replace('/[^a-zA-Z0-9\/_-]+/', '', $route);
	    if ( array_key_exists($route, $this->routes) ) {
		    self::$currentRoute = $this->routes[$route];
		    return $this->routes[$route];
		} 

		$cleanRoutes = $this->routes;
		foreach ($cleanRoutes as $pattern => $value) {
			if ( preg_match("/^$pattern$/i", $route, $matches)
				&& (strcasecmp($value['method'], $method) === 0)) {
				unset($matches[0]);

				$value['pattern'] = $pattern;
				self::$currentRoute = $value;
				foreach ($matches as $match) {
					self::$currentRoute['values'][] = $match;
				}
				return $value;
			}
		}
		return false;
    }

    public static function handle (Permission $permission)
    {
		if ( $permission->hasPermissions() ) {

			$file = strstr(self::$currentRoute['obj'], '@', true);
			$method = substr(strstr(self::$currentRoute['obj'], '@'), 1);
			try {
				$newClass = 'App\\versions\\v' . self::$currentRoute['version'] ."\\". self::$currentRoute['component'] . '\\controllers\\' . $file;
				$object = new $newClass();
				$values = [];
				if ( Request::isPost() ) {
					$values = Request::getPost();
				} elseif ( isset(self::$currentRoute['values']) ) {
					$values = self::$currentRoute['values'];
				}

				if ( self::$currentRoute['filter'] && $values) {
						if ($cleanValues = Filter::filterInputValues(self::$currentRoute, $values)) {
							$values = $cleanValues;
						}
				}

				call_user_func_array([$object, $method], $values);
				}catch (\Exception $e) {
					throw new BaseException($e->getMessage());
			}
		}
    }


	private function __clone()
	{
	}

	private function __wakeup()
	{
	}

}