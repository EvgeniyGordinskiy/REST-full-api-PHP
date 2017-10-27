<?php

return
	[
		'/user' =>  [
			'obj'        => 'UserController@index',
			'permission' => 'auth',
			'filter'     => 'UserFilter',
			'version'    => 1.0,
			'child'      => [
				'/{id}' => [
					'obj'        => 'UserController@get',
				],
				'/{id}/post/{post_id}' => [
					'obj'        => 'UserController@getPost',
					'filter'     => 'UserWithPost.php',
					'child'      => [
						'/delete' => [
							'obj'        => 'PostController@delete',
							'permission' => 'admin',
							'version'    => 2
						]
					]
				],
			]
		],

	];