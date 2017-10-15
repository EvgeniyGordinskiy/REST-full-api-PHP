<?php

namespace App\Services\Http\Files\src;

use App\Services\Exceptions\FileException;

class Files
{
    private $files = [];
    protected $file_name;
    protected $file;
    public static $store_path_files = '/storage/app/upload';
    public static $max_file_size = '2000000';
    public static $allowed_extensions = [];
    public static $excepted_extensions = [];
    
    public function __construct()
    {
        $this->getMaxFilesize();
      $this->files = $this->getFiles();
      $this->check();
    }
    
    private function getFiles() 
    {
        if ( $_FILES ) {
            return $_FILES;
        }
        return false;
    }

    private function check()
    {
        foreach ( $this->files as $file ) {
        $this->checkFile($file);
        $this->checkFileSize($file);
        $ext = $this->checkExtension($file);
        $this->file_name = $this->file->getFilename() ? $this->file->getFilename(). ".$ext" : uniqid(Auth::user()->id). ".$ext";
        }
    }

    public function checkFile($file)
    {
        if ( !$this->isValid() ) {
            new FileException('Your file is broken', 501);
        }
        return true;
    }
    public function checkFileSize($file)
    {
        if ($file->size > static::$max_file_size) {
            abort(413,'Overly large file size',['Accept' => static::$max_file_size]);
        }
        return true;
    }

    /**
     *  Symfony\Component\HttpFoundation\File\UploadedFile:243
     * Returns the maximum size of an uploaded file as configured in php.ini.
     *
     * @return int The maximum size of an uploaded file in bytes
     */
    public static function getMaxFilesize()
    {
        $iniMax = strtolower(ini_get('upload_max_filesize'));

        if ('' === $iniMax) {
            self::$max_file_size = PHP_INT_MAX;
        }

        $max = ltrim($iniMax, '+');
        if (0 === strpos($max, '0x')) {
            $max = intval($max, 16);
        } elseif (0 === strpos($max, '0')) {
            $max = intval($max, 8);
        } else {
            $max = (int) $max;
        }

        switch (substr($iniMax, -1)) {
            case 't': $max *= 1024;
            case 'g': $max *= 1024;
            case 'm': $max *= 1024;
            case 'k': $max *= 1024;
        }

        self::$max_file_size = $max;
    }
    
    public function checkExtension()
    {
        if ( $ext = $this->file->guessExtension() ) {
            if (static::$allowed_extensions) {
                if ( !in_array($ext, static::$allowed_extensions) || in_array($ext, static::$excepted_extensions) ) {
                    abort(510,'' ,['Accept' => implode(',', static::$allowed_extensions)]);
                }
            }
        } else {
            abort(510,'' ,['Accept' => implode(',', static::$allowed_extensions)]);
        }
        return $ext;
    }
}