<?php
namespace App\Services\Route;
use App\Services\Exceptions\BaseException;
use App\Services\Exceptions\FileException;
use App\Services\Exceptions\NotFoundRouteException;
use App\Services\Permissions\Permission;
use App\versions\v1\controllers\UserController;

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
			try {
				$cleanRoutes = $this->cleanRoutes($this->routes);
				$route = preg_replace('/[^a-zA-Z0-9\/_-]+/', '', $route);
				foreach ($cleanRoutes as $pattern => $value) {
					if ( preg_match("/$pattern$/i", $route) ) {
						self::$currentRoute = $value;
						return $value;
					}
				}throw new NotFoundRouteException('Route not found');

			} catch (\Exception $e) {
			//	throw new NotFoundRouteException('Route not found');
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
				$file = explode('@',self::$currentRoute['obj'])[0];
				$method = explode('@',self::$currentRoute['obj'])[1];
  		      //  $pathToFile = config('app','controller_path').self::$currentRoute['version'].DIRECTORY_SEPARATOR.'controllers'.DIRECTORY_SEPARATOR.$file . ".php";
				try {
					$newClass = 'App\\versions\\v' . self::$currentRoute['version'] . '\\controllers\\' . $file;
					$object = new $newClass();
					dump(call_user_func_array([$object, $method], []));
				}catch (\Exception $e) {
					throw new BaseException($e->getMessage());
				}
		}
    }
}