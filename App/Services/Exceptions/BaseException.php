<?php

namespace App\Services\Exceptions;

use App\Services\Http\Response\Response;
use App\Services\Log\Log;

class BaseException extends \Exception
{
	public function __construct ($message = false) {
            new Log($this, $message);
	}

    public function setHeader($header)
    {
        Response::setHeader($header);
    }
}