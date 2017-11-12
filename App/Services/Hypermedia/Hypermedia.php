<?php

namespace App\Services\Hypermedia;

interface Hypermedia
{
    public function create($message, $status, $object);

    public function send();
}