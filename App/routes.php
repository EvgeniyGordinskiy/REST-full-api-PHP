<?php

$auth = require SITE_ROOT.'/App/versions/v1/auth/routes.php';
$forgotPassword = require SITE_ROOT.'/App/versions/v1/forgotPassword/routes.php';
$users = require SITE_ROOT.'/App/versions/v1/users/routes.php';
$posts = require SITE_ROOT.'/App/versions/v1/posts/routes.php';
$usersPosts = require SITE_ROOT.'/App/versions/v1/usersPost/routes.php';
return
[
	 [
		'permission' => 'guest',
		'name'      => 'interface',
		'child'      => [
			$auth,
			$forgotPassword,
//			$users,
//			$posts,
//			$usersPosts

		]
	],
];