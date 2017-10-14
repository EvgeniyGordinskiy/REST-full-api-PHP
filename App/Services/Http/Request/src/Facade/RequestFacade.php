<?php

namespace App\Services\Http\Request;

use App\Services\Http\Files\Files;

class RequestFacade
{
    /**
     * RequestInterface constructor.
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Sets the parameters for this request.
     *
     * @param array $query
     * @param array $request
     * @param array $attributes
     * @param array $cookies
     * @param array $files
     * @param array $server
     * @param null $content
     * @return mixed
     */
    public function initialize(
        array $query = array(),
        array $request = array(),
        array $attributes = array(),
        array $cookies = array(),
        array $files = array(),
        $content = null)
    {
        $this->query = $_GET;
        $this->request = $_POST;
        $this->cookies = $_COOKIE;
        $this->files = new Files();
    }
}