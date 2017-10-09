<?php

namespace App\Services\Http;

interface HttpHeadersInterface
{
    public function __construct ();

    /**
     * Set headers
     *
     * @param string       $header The HTTP header name
     * @param string|array $values  The value or an array of values
     * @param bool         $replace Whether to replace the actual value or not (true by default)
     * @return mixed
     */
    public function set ($header, $values, $replace = true);

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