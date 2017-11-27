<?php
namespace App\versions\v1\auth\models;

use App\Services\Model\Model;
use App\Services\DB\DB;

class AuthModel extends Model
{
	public static function checkUser(string $email, string $password)
	{
		$sql = "select * from users where email = :email and  password = :password";
		DB::prepare($sql);
		$res = DB::execute([':email' => $email, ':password' => $password]);
		return $res;
	}
}