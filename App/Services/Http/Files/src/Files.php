<?php

namespace App\Services\Http\Files\src;

class Files
{
    private $files = [];
    
    public function __construct()
    {
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
        if ( !$request->file || !$request->file->isValid() ) {
            abort(501,'Your file is broken');
        }
        return $request->file;
    }
    public function checkFileSize()
    {
        if ($this->file->getClientSize() > static::$max_file_size) {
            abort(413,'Overly large file size',['Accept' => static::$max_file_size]);
        }
        return true;
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