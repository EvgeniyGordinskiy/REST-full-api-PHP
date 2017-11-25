<?php

namespace App\versions\v1\users\Filter;

use App\Services\Filter\IFilter;

class indexFilter implements IFilter
{
	public function run($parameters)
	{
		return  true;
	}
}