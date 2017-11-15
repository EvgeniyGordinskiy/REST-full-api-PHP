<?php
namespace App\versions\v1\users\models;

use App\Services\Model\Model;
use App\Services\DB\DB;

class User extends Model
{
	public static function getClients()
	{
		$sql = DB::exec("Select * from users");
		return $sql->fetchAll(\PDO::FETCH_ASSOC);
	}
	
	public static function getClient($id)
	{
		$sql = DB::exec("Select * from users where id = $id");
		return $sql->fetchAll(\PDO::FETCH_ASSOC);
	}

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