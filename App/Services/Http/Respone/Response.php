<?php

namespace App\Services\Http\Response;

class Response
{
	public function __construct()
	{
		$this->createResponse();
	}

	protected function createResponse()
	{
		return new 	\Zend\Diactoros\Response();
	}
}