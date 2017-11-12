<?php

namespace App\Services\Hypermedia\Hal;

use App\Services\Hypermedia\Hypermedia;
use App\Services\Route\Route;

class Hal implements Hypermedia
{
    public function create($class)
    {
        $routes = Route::$all_routes;
        if ( is_array($routes) ) {
            foreach ($routes as $route) {
                if (strstr($route['obj'], '@', true) === $class) {
                    dd($route);
                }
            }

        }
    }

}