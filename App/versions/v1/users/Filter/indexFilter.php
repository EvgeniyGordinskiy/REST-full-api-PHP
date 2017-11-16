<?php

namespace App\versions\v1\users\Filter;

use App\Services\Filter\IFilter;

class indexFilter implements IFilter
{
    public function run($parameters)
    {
        $user_id = intval($parameters[0]);
        return  is_int($user_id);
    }
}