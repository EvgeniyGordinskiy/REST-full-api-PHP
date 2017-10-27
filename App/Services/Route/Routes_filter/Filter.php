<?php
namespace App\Services\Route\Routes_filter;

use App\Services\Exceptions\FilterException;
use App\Services\Exceptions\RouteException;

class Filter implements RoutesFilter
{
	private $routeUrl;
	private $rows;

	public function __construct()
	{
		$this->rows = config('app', 'routes_rows');
	}

	/**
	 * Checking route by all rows
	 * @param $route
	 * @param $routeUrl
	 */
	public function transform(&$route, &$routeUrl)
	{
		$this->validateRouteUrl($routeUrl);
		$routeUrl = $this->url($routeUrl);
		$this->routeUrl = $routeUrl;
		foreach ($this->rows as $row) {

			if ( !method_exists($this, $row) ) {
				throw new FilterException("unknown method $row");
			}

			if ( !isset($route[$row]) ) {
				$route[$row] = '';
			} else {

				$result = call_user_func_array([$this, $row], [$route[$row]]);

				if ( !is_bool($result) ) {
					$route[$row] = $result;
				}
			}
		}
	}
	/**
	 * Creating pattern from routes url
	 * @param $url
	 * @return mixed
	 */
	public function url($url)
	{
		return preg_replace(['/{(.*?)}/', '/\//'], ['[a-zA-Z0-9]+', '\/'] ,$url);
	}


	/**
	 * Check obj syntax
	 * @param $obj
	 * @return bool
	 */
	public function obj($obj)
	{
		if ( !preg_match('/^(\w+)@(\w+)$/', $obj) ) {
			throw new RouteException("Wrong syntax routes object in the route: '$this->routeUrl'");
		}
		return true;
	}

	/**
	 * Checking routes version
	 * @param $version
	 * @return bool
	 */
	public function version($version)
	{
		if ( !is_int($version) && !is_float($version) ) {
			throw new RouteException("Wrong syntax routes version in the route: '$this->routeUrl'");
		}
		return true;
	}

	/**
	 * Checking routes filter
	 * @param $filter
	 * @return bool
	 */
	public function filter($filter)
	{
		if ( !preg_match('/^(\w+)$/', $filter) ) {
			throw new RouteException("Wrong syntax routes filter in the route: '$this->routeUrl'");
		}
		return true;
	}

	/**
	 * If permission is not string or array throw RouteExeption.
	 * Else create array with this string.
	 * @param $permission
	 * @return array
	 */
	public function permission($permission)
	{
		$checkedPermission = $permission;
		if ( !is_array($permission) ) {
			if ( !is_string($permission) ) {
				throw new RouteException("Permission must be instance string or array in the route: '$this->routeUrl'");
			}
			if ( !preg_match('/^(\w+)$/', $permission) ) {
				throw new RouteException("Wrong syntax routes permission. in the route: '$this->routeUrl'");
			}
			$checkedPermission = [$permission];
		} else {
			foreach ( $permission as $perm ) {
				if ( !preg_match('/^(\w+)$/', $perm) ) {
					throw new RouteException("Wrong syntax routes permission. in the route: '$this->routeUrl'");
				}
			}
		}
		return $checkedPermission;
	}

	/**
	 * Check beforeRoute syntax
	 * @param $beforeRoute
	 * @return bool
	 */
	public function beforeRoute($beforeRoute)
	{
		if ( !preg_match('/^(\w+)@(\w+)$/', $beforeRoute) ) {
			throw new RouteException("Wrong syntax routes beforeRoute in the route: '$this->routeUrl'");
		}
		return true;
	}

	/**
	 * Check afterRoute syntax
	 * @param $afterRoute
	 * @return bool
	 */
	public function afterRoute($afterRoute)
	{
		if ( !preg_match('/^(\w+)@(\w+)$/', $afterRoute) ) {
			throw new RouteException("Wrong syntax routes afterRoute in the route: '$this->routeUrl'");
		}
		return true;
	}

	/**
	 * Validate routes url
	 * @param $routeUrl
	 * @return bool
	 */
	public function validateRouteUrl($routeUrl)
	{
		if ( !preg_match('/^[a-zA-Z0-9\_-\{\}\/\$]+$/', $routeUrl) ) {
			throw new RouteException("Wrong syntax routes routes url in the route: '$this->routeUrl'");
		}

		preg_match_all('/[\(\)\[\]\{\}]/', $routeUrl, $matches);
		$braces = $matches[0];
		$opening = '{';
		$braces_map = ['{' => '}'];
		$open_braces = [];
		foreach ($braces as $brace) {
			if ( $brace === $opening ) {
				$open_braces[] = $brace;
				continue;
			}
			if (empty($open_braces)) {
				return FALSE;
			}
			if ($braces_map[array_pop($open_braces)] !== $brace) {
				return FALSE;
			}
		}

		if ( !empty($open_braces) ) {
			throw new RouteException("Wrong syntax routes routes url in the route: '$this->routeUrl'");
		}

		return true;
	}
}