<?php

namespace App\Services\Http\Files\src;

class Files
{
    private $files;
    
    public function __construct()
    {
      $this->files = $this->getFiles();
        
    }
    
    private function getFiles() 
    {
        if( count($_FILES) === 1) {
            return $_FILES[0];
        }
        
        return $_FILES;
    }
}