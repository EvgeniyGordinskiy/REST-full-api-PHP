<?php

namespace App\Services\Exceptions;

class PermissionException extends BaseException
{
	public function __construct($message = false)
	{
		parent::__construct($message);
	}
}