<?php

return
[
	// ===============================    PATHS   ===============================
	'log' => [
		'path'  => SITE_ROOT.DIRECTORY_SEPARATOR.'storage/log',
		'byDay' => true
	],

	'controller_path' => SITE_ROOT."/App/versions/v",
	'migrations_path' => SITE_ROOT.'/config/db/migrations',

	// ===============================   VARIABLES  ===============================
	'routes_rows'     => [
							'obj',
							'permission',
							'filter',
							'version',
							'beforeRoute',
							'afterRoute'
						 ],
];