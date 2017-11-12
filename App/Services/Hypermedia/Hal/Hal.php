<?php

namespace App\Services\Hypermedia\Hal;

use App\Services\Hypermedia\Hypermedia;

class Hal implements Hypermedia
{
    public function create($message, $status, $object)
    {
        dd($object);
        // TODO: Implement create() method.
    }
    
    public function send()
    {
        // TODO: Implement send() method.
    }
}