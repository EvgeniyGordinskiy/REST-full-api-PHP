<?php
namespace App\Services\Permissions;

class Permission
{
	public static function checkPermissions ($userPermissions) {

		$permissions = require_once SITE_ROOT.'/config/permissions.php';
		try{
			if(  $userPermissions  ) {
				if( is_array($userPermissions) ) {
					$permissions = array_intersect_key($permissions, array_flip($userPermissions));
					array_walk($permissions, function ($permission) {
						if ( is_callable($permission) ) {
							$permission();
						}
					});
				}

				if ( is_string($userPermissions) ) {
					if ( isset($permissions[$userPermissions]) && is_callable($permissions[$userPermissions]) ) {
						$permissions[$userPermissions]();
					}
				}
			}
		} catch (\Exception $e) {
			throw new PermissionException();
		}

	}
}