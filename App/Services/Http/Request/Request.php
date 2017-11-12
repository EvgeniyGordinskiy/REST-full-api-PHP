<?php
namespace App\Services\Http\Request;

use Zend\Diactoros\ServerRequestFactory;

class Request
{
	// Zend\Diactoros\ServerRequest instance
    public $server;

	/**
	 * Request constructor.
	 */
	public function __construct()
	{
		$this->_getServerRequest();
	}

	/**
	 * Create instance of ServerRequest and saving to the property server
	 */
	protected function _getServerRequest()
	{
		$this->server = ServerRequestFactory::fromGlobals();
	}

	/**
	 * Allowing us get property of ServerRequest,
	 * without using public property server.
	 * 
	 * @param string $property
	 * @return null|string
	 */
	public function __get(string $property)
	{
		$params = $this->server->getQueryParams();
		if (array_key_exists($property, $params)) {
			return $params[$property];
		}
		return null;
	}
}