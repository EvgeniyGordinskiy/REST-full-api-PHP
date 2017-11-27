<?php

return
	[
		'path'       => '/auth',
		'obj'        => 'AuthController@index',
		'method'	 => 'post',
		'filter'     => 'IndexFilter',
		'component'  => 'auth',
		'desc'		 => 'Login or get current user',
		'version'    => 1.0,
	];