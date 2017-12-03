<?php

namespace App\versions\v1\auth\filter;

use App\Services\Exceptions\FilterException;
use App\Services\Filter\IFilter;

class PostFilter implements IFilter
{
    public function run($parameters)
    {
        if ( isset($parameters['email']) && filter_var($parameters['email'], FILTER_VALIDATE_EMAIL) ) {
            $email = $parameters['email'];
        } else {
            throw new FilterException('Invalid e-mail address');
        }
        if ( isset($parameters['password']) && is_string($parameters['password'])) {

            if (isset($parameters['confirm_password']) && is_string($parameters['confirm_password'])) {
                if ( strcasecmp($parameters['confirm_password'],$parameters['password']) ) {
                    $password = crypt($parameters['password'], 'sad$safe(*fevv*/e'.microtime());
                    return  [$email, $password];
                }
            } else {
                throw new FilterException('Invalid confirm password');
            }
        }else {
            throw new FilterException('Invalid password');
        }
        return  false;
    }
}