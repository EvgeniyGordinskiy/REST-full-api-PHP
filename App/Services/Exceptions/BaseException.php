<?php

namespace App\Services\Exceptions;

use App\Services\Http\Response\Response;
use App\Services\Log\Log;

class BaseException extends \RuntimeException
{
	/**
	 * BaseException constructor. Send headers with message and status.
	 * @param string|null $message
	 */
	public function __construct (string $message = null, $code = 500)
	{
		$message = ucfirst(strtolower($message));
        new Log($this, $message);
		$response = new Response();
		$response->setStatusCode($code);
		$response->send("</br><b>$message</b> in file ".$this->getFile().' on line '.$this->getLine()."\n".preg_replace('/#/','</br>#',$this->getTraceAsString()));
		exit();
    }
}