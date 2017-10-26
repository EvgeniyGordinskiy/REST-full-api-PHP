<?php

return
[
	'log' => [
		'path'  => SITE_ROOT.DIRECTORY_SEPARATOR.'storage/log',
		'byDay' => true
	],

	'controller_path' => SITE_ROOT."/App/versions/v",
	'migrations_path' => SITE_ROOT.'/config/db/migrations'
];