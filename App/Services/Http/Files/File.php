<?php

namespace App\Services\Http\Files;

use App\Services\Http\Files\src\Files;

class File extends Files
{
    public function __construct($file = null)
    {
        if (!$file) {
            $files = parent::__construct();
            if ( is_array($files)) {
                foreach ($files as $file) {
                    return ( new self($file) );
                }
            } else {
                return ( new self($files) );
            }
        } else {

        }

    }
}