<?php

return
	[
		'path'		=> '/forgotPassword',
		'obj'        => 'ForgotPasswordController@index',
		'method'	 => 'post',
		'filter'     => 'IndexFilter',
		'component'  => 'forgotPassword',
		'desc'		 => 'Send email for password reset.',
		'version'    => 1.0,
		'child'		=> [
		],
	
	];