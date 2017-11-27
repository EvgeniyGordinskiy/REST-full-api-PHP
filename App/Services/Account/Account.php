<?php
namespace App\Services\Auth;

class Account implements IAccount
{
	public $user;

	/**
	 * Account constructor.
	 * @param AccountFilter $filter
	 * @param array $parameters
	 */
	public function __construct(AccountFilter $filter,array $parameters)
	{
		$this->user = $filter->run($parameters);
	}

	public function get()
	{
		// TODO: Implement get() method.
	}

	public function update()
	{
		// TODO: Implement update() method.
	}
}