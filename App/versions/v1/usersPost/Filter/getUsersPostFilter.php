<?php
namespace App\versions\v1\usersPost\Filter\getUsersPost;

use App\Services\Filter\IFilter;

class getUsersPostFilter implements IFilter
{
    public function run($parameters)
    {
        return  array_product([
            'user_id' => is_int($parameters[0]),
            'post_id' => is_int($parameters[1])
        ]);   
    }
}