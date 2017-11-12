<?php
namespace App\Services\Permissions;

use App\Services\Http\Request\Request;

class Admin implements IPermission
{
	public function __construct()
	{
		// $request = (new Request())->getHeader('auth');
	}

	public function check()
	{
//		var_dump('admin check');
		return true;
	}
}