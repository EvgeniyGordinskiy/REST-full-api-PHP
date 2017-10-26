<?php

$users = require SITE_ROOT.'/App/versions/v1/users/routes.php';
$posts = require SITE_ROOT.'/App/versions/v1/posts/routes.php';
return
[
	'users' => $users,
	'posts' => $posts
];