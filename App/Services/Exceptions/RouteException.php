<?php

namespace App\Services\Exceptions;

class RouteException extends BaseException
{
	public function __construct($message = false, $code)
	{
		parent::__construct($message, $code);
	}
}
