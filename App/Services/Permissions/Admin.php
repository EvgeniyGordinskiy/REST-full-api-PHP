<?php
namespace App\Services\Permissions;

use App\Services\Http\Request\Request;

class Admin
{
	public function __construct()
	{
		// $request = (new Request())->getHeader('auth');
	}

	public function check()
	{
		dump('admin check');
		return true;
	}
}