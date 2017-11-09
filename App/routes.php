<?php

$users = require SITE_ROOT.'/App/versions/v1/users/routes.php';
$posts = require SITE_ROOT.'/App/versions/v1/posts/routes.php';
return
[
	 [
		'permission' => 'guest',
		 'name'      => 'interface',
		'child'      => [
			$users,
			$posts,
		]
	],
	[
		'name'       => 'dashboard',
		'permission' => 'admin',
		'child'      => [
			$users,
			$posts,
		]
	]
];