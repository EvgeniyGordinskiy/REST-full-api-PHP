<?php
namespace App\Services\Http\Request;

use Zend\Diactoros\ServerRequestFactory;

class Request
{
    public $server;
	public function __construct()
	{
		$this->getServerRequest();
	}	

	protected function getServerRequest()
	{
		$this->server = ServerRequestFactory::fromGlobals();
	}

	public function getHeader($header)
	{
		
	}


	public function __get($property)
	{
		$params = $this->server->getQueryParams();
		if (array_key_exists($property, $params)) {
			return $params[$property];
		}
		return null;
	}
}