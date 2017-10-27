<?php

namespace App\Services\Exceptions;

class FilterException extends BaseException
{
	public function __construct($message = false)
	{
		parent::__construct($message);
	}
}