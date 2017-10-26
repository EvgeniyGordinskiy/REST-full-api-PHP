<?php

return
	[
		'/post' =>  [
			'obj'        => 'PostController@index',
			'permission' => '',
			'version'    => 1,
			'child'      => [
				'/{id}' => [
					'obj'        => 'PostController@get',
					'permission' => ['auth','admin'],
					'version'    => 1
				],			]
		],

	];