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
		}
    }
}