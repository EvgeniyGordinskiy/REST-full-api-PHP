<?php

return
	[
			'path'       => '/user',
			'obj'        => 'UserController@index',
			'method'	 => 'get',
			'filter'     => 'UserFilter',
			'component'  => 'users',
			'desc'		 => 'Get all users',
			'version'    => 1.0,
			'child'      => [
				[
					'path'       => '/{id}',
					'obj'        => 'UserController@get',
					'method'	 => 'get',
					'desc'		 => 'Get user by id',
					'permission' => ['auth', 'auth'],

				],
				[
				 	'path'       => '/post/{post_id}',
					'obj'        => 'UserController@getPost',
					'method'	 => 'get',
					'filter'     => 'UserWithPost',
					'desc'		 => 'Get users post by id',
					'child'      => [
						[
							'path'       => '/delete',
							'obj'        => 'PostController@delete',
							'method'	 => 'delete',
							'permission' => ['admin', 'auth', 'auth'],
							'desc'		 => 'Delete users post by id',
							'component'     => 'posts',
							'version'    => 2
						]
					]
				],
			]
	];