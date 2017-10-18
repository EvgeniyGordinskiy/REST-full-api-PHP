<?php

namespace App\Services\Exceptions;

use App\Services\Http\Response\Response;

class BAseException extends \Exception
{
    public function setHeader($header)
    {
        Response::setHeader($header);
    }
}