<?php
namespace App\Services\Log;

use App\Services\Exceptions\FileException;

class Log
{
	private $file;

	public function __construct($exception = false, $body = false, $file = false, $line = false)
	{
		$this->checkFile();
		dump($body);
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
			$trace = '\n '.$exception->getTraceAsString().' \n ';
		}

		$message = "$body in file $file on line $line $trace";
		fwrite($this->file, $message);
		fclose($this->file);
	}

	private function checkFile()
	{
		if ($path = config('app', 'log')['path']) {
			$data = date('dmY');
			$file = $path . DIRECTORY_SEPARATOR . $data . 'Log.php';

			if (!is_dir($path)) {
				$perm = substr(sprintf('%o', fileperms(dirname($path))), -3);
				if ($perm != 777) {
					@chmod(dirname($path), 0777);
				}
				if (false === @mkdir($path, 0777, true)) {
					throw new \Exception(sprintf('Unable to create the "%s" directory', $path));
				}
			} elseif (!file_exists($file)) {
				if ( false === ($this->file = fopen($file,'w'))) {
					throw new \Exception(sprintf('Unable to create the "%s" file', $file));
				}
				@chmod(dirname($file), 0777);
				@chmod($file, 0777);
			} elseif (!is_writable($file)) {
				throw new \Exception(sprintf('Unable to write in the "%s" directory', $file));
			} else {
				$this->file = fopen($file,'a');
			}
		}
	}

}