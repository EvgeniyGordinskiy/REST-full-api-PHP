<?php

namespace App\Services\Http\Files;

use App\Services\Http\Files\src\Files;

class RequestFile extends Files
{

    protected $file_name;
    protected $file;
    public static $store_path_files = '/storage/app/upload';
    public static $max_file_size = '2000000';
    public static $allowed_extensions = [];
    public static $excepted_extensions = [];

    public function __construct($file = null)
    {
        if (!$file) {
            $files = parent::__construct();
            return $files;
        } else {
            return ( new self($file) );
        }
    }

    private function create($files) {
        $objects = [];
        if ( is_array($files) ) {
            foreach ($files as $i => $file) {
                $objects[] = $this->init(new self($file));
            }
        } else {
            return ( new self($files) );
        }

        return $objects;
    }


    public function store()
    {
        $this->file->move(base_path().static::$store_path_files, $this->file_name);
        return $this->file_name;
    }
    
}