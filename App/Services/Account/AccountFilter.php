<?php
namespace App\Services\Auth;

use App\Services\DB\DB;
use App\Services\Filter\IFilter;

class AccountFilter implements IFilter
{
	public function run($parameters)
	{
		if ( isset($parameters['email']) ) {
			$email = $parameters['email'];
		} else {
			throw new \InvalidArgumentException();
		}

		if ( isset($parameters['password']) ) {
			$password = crypt($parameters['password']);
		} else {
			throw new \InvalidArgumentException();
		}

		$sql = "select * from users where email = $email and password = $password";
		DB::exec($sql);
	}

}