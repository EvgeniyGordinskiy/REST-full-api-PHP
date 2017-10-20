<?php

namespace App\Services\FileSystem;

class File extends \SplFileObject
{
		public function __construct($file, $open_mode, $use_include_path = false)
		{
			$path = dirname($file);
			if (!is_dir($path)) {
				$perm = substr(sprintf('%o', fileperms(dirname($path))), -3);
				if ($perm != 777) {
					@chmod(dirname($path), 0777);
				}
				if (false === @mkdir($path, 0777, true)) {
					throw new \Exception(sprintf('Unable to create the "%s" directory', $path));
				}
			} elseif (!file_exists($file)) {
//				if ( false === ($this->file = fopen($file,'w'))) {
//					throw new \Exception(sprintf('Unable to create the "%s" file', $file));
//				}
//				@chmod(dirname($file), 0777);
//				@chmod($file, 0777);
			} elseif (!is_writable($file)) {
				throw new \Exception(sprintf('Unable to write in the "%s" directory', $file));
			}
			parent::__construct($file, $open_mode, $use_include_path);
		}
}