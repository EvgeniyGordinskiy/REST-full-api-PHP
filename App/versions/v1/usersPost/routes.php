<?php

return [
        'path'       => '/user/{id}/post/{post_id}',
        'obj'        => 'UsersPostController@index',
        'method'	 => 'get',
        'filter'     => 'UsersPost',
        'component'  => 'usersPost',
        'desc'		 => 'Get users post by id',
        'version'    => 1,
        'child'      => [
            [
                'path'       => '/delete',
                'obj'        => 'UsersPostController@delete',
                'method'	 => 'delete',       
                'filter'     => 'UsersPost',
                'permission' => ['admin', 'auth', 'auth'],
                'desc'		 => 'Delete users post by id',
                'component'     => 'posts',
                'version'    => 1
            ]
        ]
 ];