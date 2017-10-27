<?php

namespace App\Services\Exceptions;

class RouteException extends BaseException
{
	public function __construct($message = false)
	{
		parent::__construct($message);
	}
}
