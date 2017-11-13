<?php

return
	[
		 	'path'       => '/post',
			'obj'        => 'PostController@index',
			'method'	 => 'get',
			'version'    => 1,
			'child'      => [
				[
					'path'       => '/{id}',
					'obj'        => 'PostController@get',
					'method'	 => 'get',
					'permission' => ['auth','admin'],
					'version'    => 1
				],
			]
	];