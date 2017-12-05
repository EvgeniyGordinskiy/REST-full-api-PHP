<?php

return
	[
		'path'		=> '/auth',
		'child'		=> [
			[
				'path'       => '/login',
				'obj'        => 'AuthController@index',
				'method'	 => 'post',
				'filter'     => 'IndexFilter',
				'component'  => 'auth',
				'desc'		 => 'Login or get current user',
				'version'    => 1.0,
			],
			[
				'path'       => '/register',
				'obj'        => 'AuthController@post',
				'method'	 => 'post',
				'filter'     => 'PostFilter',
				'component'  => 'auth',
				'desc'		 => 'Register new user',
				'version'    => 1.0,
			]
		],
	
	];