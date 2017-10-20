<?php

return
[
	'/user' =>  [
		'obj'        => 'UserController@index',
		'permission' => '',
		'version'    => 1
		],
	'/user/{id}' => [
		'obj'        => 'UserController@get',
		'permission' => ['auth','admin'],
		'version'    => 1
	],
	'/user/{id}/post/{post_id}' => [
		'obj'        => 'UserController@getPost',
		'permission' => 'auth',
		'version'    => 1
	],
];