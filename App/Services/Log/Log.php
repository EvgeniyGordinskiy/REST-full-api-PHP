<?php
namespace App\Services\Log;

use \App\Services\FileSystem\File;

class Log
{

	public function __construct($exception = false, $body = false, $file = false, $line = false)
	{
		if ( !$body ) {
			$body = $exception->getMessage();
		}

		if ( !$file ) {
			$file = $exception->getFile();
		}

		if ( !$line ) {
			$line = $exception->getLine();
		}
		$trace = "\n";

		if ( $exception && $exception instanceof \Exception) {
			$trace = '\n '.$exception->getTraceAsString()." \n ";
		}

		$message = date('Y-m-d H:i:s')." $body in file $file on line $line $trace";

		if ($path = config('app', 'log')['path']) {
			$data = date('dmY');
			$file = $path . DIRECTORY_SEPARATOR . $data . 'Log.php';
			$file = new File($file,'a');
			$file->fwrite($message);
		}
	}

}