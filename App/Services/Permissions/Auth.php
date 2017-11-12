<?php
namespace App\Services\Permissions;

use App\Services\Http\Request\Request;

class Auth implements IPermission
{
   public function __construct()
   {
	  // $request = (new Request())->getHeader('auth');
   }

   public function check()  : bool 
   {
	   var_dump('auth check');
	   return true;
   }
}