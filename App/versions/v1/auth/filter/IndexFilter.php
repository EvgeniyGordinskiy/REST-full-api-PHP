<?php

namespace App\versions\v1\auth\filter;

use App\Services\Filter\IFilter;

class IndexFilter implements IFilter
{
	public function run($parameters)
	{
		if ( isset($parameters['email']) && filter_var($parameters['email'], FILTER_VALIDATE_EMAIL) ) {
			$email = $parameters['email'];
		} else {
			throw new \InvalidArgumentException('Invalid e-mail address');
		}
		if ( isset($parameters['password']) && is_string($parameters['password'])) {
			$password = crypt($parameters['password'], 'sad$safe(*fevv*/e'.microtime());
		} else {
			throw new \InvalidArgumentException('Password must be a string');
		}
		return  [$email, $password];
	}
}