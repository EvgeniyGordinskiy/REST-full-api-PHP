<?php

return
	[
			'path'       => '/user',
			'obj'        => 'UserController@index',
			'filter'     => 'UserFilter',
			'component'  => 'users',
			'desc'		 => 'Get all users',
			'version'    => 1.0,
			'child'      => [
				[
					'path'       => '/{id}',
					'obj'        => 'UserController@get',
					'desc'		 => 'Get user by id',
					'permission' => ['auth', 'auth'],

				],
				[
				 	'path'       => '/{id}/post/{post_id}',
					'obj'        => 'UserController@getPost',
					'permission' => 'her',
					'filter'     => 'UserWithPost',
					'desc'		 => 'Get users post by id',
					'child'      => [
						[
							'path'       => '/delete',
							'obj'        => 'PostController@delete',
							'permission' => ['admin', 'auth', 'auth'],
							'desc'		 => 'Delete users post by id',
							'component'     => 'posts',
							'version'    => 2
						]
					]
				],
			]
	];