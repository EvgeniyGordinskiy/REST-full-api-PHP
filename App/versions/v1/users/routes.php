<?php

return
	[
		'/user' =>  [
			'obj'        => 'UserController@index',
			'filter'     => 'UserFilter',
			'version'    => 1.0,
			'child'      => [
				'/{id}' => [
					'obj'        => 'UserController@get',
					'permission' => ['auth', 'auth'],
				],
				'/{id}/post/{post_id}' => [
					'obj'        => 'UserController@getPost',
					'permission' => 'her',
					'filter'     => 'UserWithPost',
					'child'      => [
						'/delete' => [
							'obj'        => 'PostController@delete',
							'permission' => ['admin', 'auth', 'auth'],
							'version'    => 2
						]
					]
				],
			]
		],

	];