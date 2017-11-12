<?php

return
	[
			'path'       => '/user',
			'obj'        => 'UserController@index',
			'filter'     => 'UserFilter',
			'component'     => 'users',
			'version'    => 1.0,
			'child'      => [
				[
					'path'       => '/{id}',
					'obj'        => 'UserController@get',
					'permission' => ['auth', 'auth'],

				],
				[
				 	'path'       => '/{id}/post/{post_id}',
					'obj'        => 'UserController@getPost',
					'permission' => 'her',
					'filter'     => 'UserWithPost',
					'child'      => [
						[
							'path'       => '/delete',
							'obj'        => 'PostController@delete',
							'permission' => ['admin', 'auth', 'auth'],
							'version'    => 2
						]
					]
				],
			]
	];