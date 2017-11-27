<?php
namespace App\Services\Auth;


interface IAccount
{
	/**
	 * IAccount constructor.
	 * @param AccountFilter $filter
	 * @param array $parameters
	 */
	public function __construct(AccountFilter $filter, array $parameters);

	/**
	 * Get current user
	 * @return mixed
	 */
	public function get();

	/**
	 * Update current user
	 * @return mixed
	 */
	public function update();
}