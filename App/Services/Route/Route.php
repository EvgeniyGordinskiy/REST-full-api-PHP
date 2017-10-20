<?php
namespace App\Services\Route;
class Route
{
    public $routes;
    
    public function __construct()
    {
        $this->routes = require_once SITE_ROOT.'/App/routes.php';
    }

    public function parseRoute($route)
    {
		if ( array_key_exists($route, $this->routes) ) {
			return $this->routes[$route];
		} else {
             $cleanRoutes = $this->cleanRoutes($this->routes);
			 $route = preg_replace('/[^a-zA-Z0-9\/_-]+/', '', $route);
			foreach ($cleanRoutes as $pattern => $value) {
				 if ( preg_match("/$pattern$/i", $route) ) {
					 return $value;
				 }
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
}