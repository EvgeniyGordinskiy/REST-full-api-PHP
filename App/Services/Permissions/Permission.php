<?php
namespace App\Services\Permissions;

use App\Services\Exceptions\PermissionException;

final class Permission
{
	private $isPermission;

	private function __construct ($permission) {
		$this->isPermission = $permission;
	}

	public static function checkPermissions ($userPermissions) {

		$permissions = require_once SITE_ROOT.'/config/permissions.php';
		try{
			if ( $userPermissions ) {
				if( is_array($userPermissions) ) {
					$permissions = array_intersect_key($permissions, array_flip($userPermissions));
					array_walk($permissions, function ($permission, $key) {
						if ( is_callable($permission) ) {
							if ( ! $permission() ) {
								throw new PermissionException("Permission $key is denied");
							}
						}
					});
				}

				if ( is_string($userPermissions) ) {
					if ( isset($permissions[$userPermissions]) && is_callable($permissions[$userPermissions]) ) {
						if ( ! $permissions[$userPermissions]() ) {
							throw new PermissionException("Permission $userPermissions is denied");
						}
					}
				}
			}
			return new self(true);
		} catch (\Exception $e) {
			throw new PermissionException($e);
		}

	}

	public function isPermissions()
	{
		return $this->isPermission;
	}
}