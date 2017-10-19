<?php
namespace App\Services\Http\Request;

use Zend\Diactoros\Request;

class SendRequest
{

	public function __construct()
	{
		$this->createRequest();
	}

	protected function createRequest()
	{
		return 	new Request();
	}
}