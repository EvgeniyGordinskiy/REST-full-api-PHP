<?php

namespace App\Services\Http;


class Http
{
    protected $headers = [];
    
    protected $get     = [];

    protected $post    = [];

    public function __construct($request)
    {
        $this->get  = $_GET;
        $this->post = $_POST;
        $this->headers = new HttpHeaders();
    }
}