<?php

namespace App\versions\v1\users\Filters;

use App\Services\Filter\IFilter;

class indexFilter implements IFilter
{
    public function run($parameters)
    {
        return  is_int($parameters[0]);
    }
}