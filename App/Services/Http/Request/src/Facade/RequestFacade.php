<?php

namespace App\Services\Http\Request;

use \Exception\ConflictingHeadersException;
use App\Services\Http\Request\RequestsFiles;

class RequestFacade extends ConflictingHeadersException
{
    /**
     * RequestInterface constructor.
     * @param array $query
     * @param array $request
     * @param array $attributes
     * @param array $cookies
     * @param array $files
     * @param array $server
     * @param null $content
     */
    public function __construct(
        array $query = array(),
        array $request = array(),
        array $attributes = array(),
        array $cookies = array(),
        array $files = array(),
        array $server = array(),
        $content = null)
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
        array $server = array(),
        $content = null)
    {
        $this->query = $_GET;
        $this->request = $_POST;
        $this->attributes = new RequestsParameters();
        $this->cookies = $_COOKIE;
        $this->files = new RequestsFiles();
    }
}