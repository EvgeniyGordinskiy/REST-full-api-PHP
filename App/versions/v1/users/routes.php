<?php

return
	[
		'/user' =>  [
			'obj'        => 'UserController@index',
			'permission' => '',
			'version'    => 1,
			'child'      => [
				'/{id}' => [
					'obj'        => 'UserController@get',
					'permission' => ['auth','admin'],
					'version'    => 1
				],
				'/{id}/post/{post_id}' => [
					'obj'        => 'UserController@getPost',
					'permission' => 'auth',
					'version'    => 1,
					'child'      => [
						'/delete' => [
							'obj'        => 'PostController@delete',
							'permission' => ['auth','admin'],
							'version'    => 1
						]
					]
				],
			]
		],

	];