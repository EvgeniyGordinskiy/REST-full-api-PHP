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
        if ( isset($parameters['name']) && is_string($parameters['name']) ) {
            $name = $parameters['name'];
            $length_name = mb_strlen($name, 'UTF8');
            if($length_name < 3) {
                throw new FilterException('The name must consist of at least 3 letters');
            }
            if($length_name > 50) {
                throw new FilterException('Maximum name length is 50 letters');
            }
        } else {
            throw new FilterException('Invalid name');
        }
        if ( isset($parameters['password']) && is_string($parameters['password'])) {

            if (isset($parameters['confirm_password']) && is_string($parameters['confirm_password'])) {
                if ( strcasecmp($parameters['confirm_password'],$parameters['password']) == 0 ) {
                    $length_password = mb_strlen($parameters['password'], 'UTF8');
                    if ($length_password < 6) {
                        throw new FilterException('The password must consist of at least 3 letters');
                    }
                    if ($length_password > 50) {
                        throw new FilterException('Maximum password length is 50 letters');
                    }
                    $password = crypt($parameters['password'], 'sad$safe(*fevv*/e'.microtime());
                    return  [$name, $email, $password];
                } else {
                    throw new FilterException('Password do not match confirm password');
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