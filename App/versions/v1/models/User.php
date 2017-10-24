<?php
namespace App\versions\v1\models;

use App\Services\Model\Model;
use App\Services\DB\DB;

class User extends Model
{
	public static function getClients()
	{
		$db = new DB();
		$sql = "Select * from users";
		return $db->exec($sql);
	}

	public static function postClient()
	{
		$db = new DB();
		$client = [
			'name' => 
		]
		$sql = "Insert into users ()";
		return $db->exec($sql);
	}
}