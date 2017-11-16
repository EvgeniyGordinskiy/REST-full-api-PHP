<?php
namespace App\versions\v1\users\models;

use App\Services\Model\Model;
use App\Services\DB\DB;

class User extends Model
{
	/**
	 * Get all clients
	 * @return array
	 */
	public static function getClients() : array
	{
		$sql = DB::exec("Select * from users");
		return $sql->fetchAll(\PDO::FETCH_ASSOC);
	}

	/**
	 * Get client by id.
	 * @param int $id
	 * @return array
	 */
	public static function getClient(int $id) : array
	{
		$sql = DB::exec("Select * from users where id = $id");
		return $sql->fetchAll(\PDO::FETCH_ASSOC);
	}

	/**
	 * Create new client.
	 */
	public static function postClient()
	{
		$client = [
			'name' => 'RealName',
			'email' => 'RealEmail'
		];
		$sql = DB::exec("Insert into users (name, email) values (".implode(', ', array_fill(0, count($client), '?')));
		dump($sql);
		//return $db->exec($sql);
	}
}