<?php

$users = require SITE_ROOT.'/App/versions/v1/users/routes.php';
$posts = require SITE_ROOT.'/App/versions/v1/posts/routes.php';
return
[
	'app' => [
		'child' => [
			'interface' => [
				'permission' => 'guest',
				'child'       => [
					'users_component' => $users,
					'posts_component' => $posts,
				]
			],
			'dashboard' => [
				'permission' => 'admin',
				'/dashboard' => [

				]
			]
		]
	]

];