<?php

return
	[
			'path'       => '/user',
			'obj'        => 'UserController@index',
			'method'	 => 'get',
			'filter'     => 'indexFilter',
			'component'  => 'users',
			'desc'		 => 'Get all users',
			'version'    => 1.0,
			'child'      => [
				[
					'path'       => '/{id}',
					'obj'        => 'UserController@index',
					'method'	 => 'get',
					'filter'	 => 'indexFilter',
					'desc'		 => 'Get user by id',
					'permission' => ['auth', 'auth'],

				]
			]
	];