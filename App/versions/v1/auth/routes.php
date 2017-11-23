<?php

return
	[
		'path'       => '/auth',
		'obj'        => 'AuthController@index',
		'method'	 => 'post',
		'filter'     => 'indexFilter',
		'component'  => 'auth',
		'desc'		 => 'Login or get current user',
		'version'    => 1.0,
	];