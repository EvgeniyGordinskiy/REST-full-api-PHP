<?php

namespace App\Services\Http;

interface HttpHeadersInterface
{
    public function __construct ();

    /**
     * Get headers
     * 
     * @param string $header The HTTP header name
     * @param mixed  $default The default value
     * @param bool   $first   Whether to return the first value or all header values
     * @return mixed
     */
    public function get ($header, $default = null, $first = true);

    /**
     * Check the header
     * 
     * @param string $header The HTTP header name
     * @return mixed
     */
    public function has ($header);

    /**
     * Remove header
     * 
     * @param string $header The HTTP header name
     * @return mixed
     */
    public function remove ($header);
    
}