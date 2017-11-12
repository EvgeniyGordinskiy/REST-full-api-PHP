<?php
namespace App\Services\Permissions;

interface IPermission
{
    public function __construct();
    
    public function check() : bool;
}