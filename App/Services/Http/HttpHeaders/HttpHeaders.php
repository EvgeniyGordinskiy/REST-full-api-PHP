<?php

namespace App\Services\Http;

class HttpHeaders implements HttpHeadersInterface
{
    protected $headers = [];
    
    /**
     * Constructor.
     *
     */
    public function __construct()
    {
        foreach ($_SERVER as $header => $value) {
            $this->headers[strtolower($header)] = $value;
        }
    }

    /**
     * Returns a header value by name.
     *
     * @param string $key     The header name
     * @param mixed  $default The default value
     * @param bool   $first   Whether to return the first value or all header values
     *
     * @return string|array The first header value if $first is true, an array of values otherwise
     */
    public function get($header, $default = null, $first = true)
    {
        $header = str_replace('-', '_', strtolower($header));

        if (!array_key_exists($header, $this->headers)) {
            if (null === $default) {
                return $first ? null : array();
            }

            return $first ? $default : array($default);
        }

        if ($first) {
            return count($this->headers[$header]) ? $this->headers[$header][0] : $default;
        }

        return $this->headers[$header];
    }

    /**
     * Returns true if the HTTP header is defined.
     *
     * @param string $header The HTTP header
     *
     * @return bool true if the parameter exists, false otherwise
     */
    public function has($header)
    {
        return array_key_exists(str_replace('-', '_', strtolower($header)), $this->headers);
    }

    /**
     * Removes a header.
     *
     * @param string $header The HTTP header name
     */
    public function remove($header)
    {
        $key = str_replace('_', '-', strtolower($header));

        unset($this->headers[$key]);

        if ('cache-control' === $key) {
            $this->cacheControl = array();
        }
    }

    /**
     * Parses a Cache-Control HTTP header.
     *
     * @param string $header The value of the Cache-Control HTTP header
     *
     * @return array An array representing the attribute values
     */
    protected function parseCacheControl($header)
    {
        $cacheControl = array();
        preg_match_all('#([a-zA-Z][a-zA-Z_-]*)\s*(?:=(?:"([^"]*)"|([^ \t",;]*)))?#', $header, $matches, PREG_SET_ORDER);
        foreach ($matches as $match) {
            $cacheControl[strtolower($match[1])] = isset($match[3]) ? $match[3] : (isset($match[2]) ? $match[2] : true);
        }

        return $cacheControl;
    }
}