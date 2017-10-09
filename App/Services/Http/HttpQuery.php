<?php

namespace App\Services\Http;


class HttpQuery 
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