<?php

namespace App\versions\v1\users\Filter;

use App\Services\Filter\IFilter;

class indexFilter implements IFilter
{
    public function run($parameters)
    {
        $user_id = intval($parameters[0]);
        
        if ( is_int($user_id) ) {
            return [$user_id];
        }
        return  false;
    }
}