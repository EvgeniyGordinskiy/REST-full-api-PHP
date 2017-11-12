<?php
namespace App\Services\Permissions;

use App\Services\Exceptions\PermissionException;

final class Permission
{
	private $_hasPermission;

	private function __construct (bool $permission) 
	{
		$this->_hasPermission = $permission;
	}

	/**
	 * @param array $route
	 * @return Permission
	 */
	public static function checkPermissions (array $route) : Permission
	{
		if ( !isset($route['permission']) ) {
			return new self(true);
		} else {
			$userPermissions = $route['permission'];
		}

		$permissions = require_once SITE_ROOT.'/config/permissions.php';
		try{
			if ( $userPermissions ) {
				
				if( is_array($userPermissions) ) {
					$permissions = array_intersect_key($permissions, array_flip($userPermissions));
					array_walk($permissions, function ($permission, $key) {
						if ( is_callable($permission) && $permission() instanceof IPermission) {
							if ( !$permission()->check() ) {
								throw new PermissionException("Permission $key is denied");
							}
						}
					});
				}

				if ( is_string($userPermissions) ) {
					if ( isset($permissions[$userPermissions]) 
						&& is_callable($permissions[$userPermissions])
						&& $permissions[$userPermissions]() instanceof IPermission) {
						if ( !$permissions[$userPermissions]()->check() ) {
							throw new PermissionException("Permission $userPermissions is denied");
						}
					}
				}
			}
			return new self(true);
		} catch (\Exception $e) {
			throw new PermissionException($e->getMessage(), $e->getCode());
		}
	}

	/**
	 * @return bool
	 */
	public function hasPermissions() : bool
	{
		return $this->_hasPermission;
	}
}