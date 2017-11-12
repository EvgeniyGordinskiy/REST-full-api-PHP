<?php

namespace App\Traits;


use App\Services\Hypermedia\Hal\Hal;

trait ResponseTrait
{

    public function send($message, $status = 200)
    {
        $hypermedia = new Hal();
        $hypermedia->create($message, $status, $this);
    }
}