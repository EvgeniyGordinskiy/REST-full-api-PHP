<?php

namespace App\versions\v1\forgotPassword\filter;

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
	
		return  [$email];
	}
}