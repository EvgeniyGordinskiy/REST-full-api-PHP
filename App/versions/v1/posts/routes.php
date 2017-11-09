<?php

return
	[
		 	'path'       => '/post',
			'obj'        => 'PostController@index',
			'version'    => 1,
			'child'      => [
				[
					'path'       => '/{id}',
					'obj'        => 'PostController@get',
					'permission' => ['auth','admin'],
					'version'    => 1
				],
			]
	];