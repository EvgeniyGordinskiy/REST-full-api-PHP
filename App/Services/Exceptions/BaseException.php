<?php

namespace App\Services\Exceptions;

use App\Services\Http\Response\Response;

class BaseException extends \Exception
{
	public function __construct () {

	}

    public function setHeader($header)
    {
        Response::setHeader($header);
    }
}