<?php
namespace App\versions\v1\usersPost\Filter;

use App\Services\Filter\IFilter;

class UsersPost implements IFilter
{
    public function run($parameters)
    {
        $user_id = intval($parameters[0]);
        $post_id = intval($parameters[1]);
        $check = is_int($user_id) ?? is_int($post_id);
        if ($check) {
            return [$user_id, $post_id] ;
        }
        return false;
    }
}