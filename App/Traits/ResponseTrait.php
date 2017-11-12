<?php

namespace App\Traits;


use App\Services\Http\Response\Response;
use App\Services\Hypermedia\Hal\Hal;
use App\Services\Hypermedia\Hypermedia;

trait ResponseTrait
{

    public function send(array $message, $status = 200)
    {
        $hypermedia = new Hal();
        array_merge($message,  $this->_makeHypermedia($hypermedia));
        $response = new Response();
        $response->setStatusCode($status);
        $response->write($message);
        $response->send();
    }
    
    protected function _makeHypermedia(Hypermedia $hypermedia) : array 
    {
        $class = basename(str_replace('\\','/',get_class($this)));
        return $hypermedia->create($class);
    }
}