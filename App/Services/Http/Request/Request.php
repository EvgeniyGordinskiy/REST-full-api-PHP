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

	/**
	 * Check if reauest method is post
	 * @return bool
	 */
	public static function isPost(): bool
	{
		return $_SERVER['REQUEST_METHOD'] === 'POST';
	}

	/**
	 * Get post valueses
	 * @return bool|mixed
	 */
	public static function getPost()
	{
		$input = file_get_contents("php://input");
		if ($input) {
			return json_decode($input, true);
		}

		return false;
	}
}