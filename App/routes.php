<?php

return
[
	'/user' =>  [
		'obj'        => 'UserController@index',
		'permission' => '',
		'version'    => 1
		],
	'user/{id}' => [
		'obj'        => 'UserController@get',
		'permission' => 'auth',
		'version'    => 1
	]
];