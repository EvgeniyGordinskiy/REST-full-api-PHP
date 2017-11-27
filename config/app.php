<?php

return
[
	// ===============================    PATHS   ===============================
	'log' => [
		'path'  => SITE_ROOT.DIRECTORY_SEPARATOR.'storage/log',
		'byDay' => true
	],
	'app_routes'      => SITE_ROOT.'/App/routes.php',
	'controller_path' => SITE_ROOT."/App/versions/v",
	'migrations_path' => SITE_ROOT.'/config/db/migrations',
	'jwt_protected_key_file' => '/home/incodepc1/.ssh/id_rsa',
	'jwt_public_key_file' => '/home/incodepc1/.ssh/id_rsa.pub',

	// ===============================   VARIABLES  ===============================
	'routes_rows'     => [
							'obj',
							'permission',
							'filter',
							'version',
							'beforeRoute',
							'afterRoute',
						 ],
];