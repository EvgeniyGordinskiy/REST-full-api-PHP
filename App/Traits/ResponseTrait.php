<?php

namespace App\Traits;


use App\Services\Http\Response\Response;
use App\Services\Hypermedia\Hal\Hal;
use App\Services\Hypermedia\Hypermedia;
use App\Services\Route\Route;

trait ResponseTrait
{

    public function send(array $items, $status = 200)
    {
        $message['_links']['self']['href'] = $_SERVER['REQUEST_URI'];
        $message['_links']['currentlyProcessing'] = count($items);
        $message['_links']['items'] = $items;
        $hypermedia = new Hal();
        $message['_embedded'] = $this->_makeHypermedia($hypermedia);
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