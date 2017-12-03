<?php
namespace App\versions\v1\auth\models;

use App\Services\JWTAuth\JWTAuth;
use App\Services\Model\Model;
use App\Services\DB\DB;

class AuthModel extends Model
{
	public static function createUser(string $email, string $password)
	{
		$sql = "select * from users where email = :email";
		DB::prepare($sql);
		$res = DB::execute([':email' => $email, ':password' => $password]);
		if (!$res) {
			$private_key = JWTAuth()
			$sql = "insert into users ()";
			DB::prepare($sql);
			$res = DB::execute([':email' => $email, ':password' => $password]);
		}
		return $res;
	}
	
	public static function login(string $email, string $password)
	{
		$sql = "select * from users where email = :email and  password = :password";
		DB::prepare($sql);
		$res = DB::execute([':email' => $email, ':password' => $password]);
		return $res;
	}

	public static function updateUserToken(string $token)
	{
		$sql = "update users set token = :$token";
		DB::prepare($sql);
		$res = DB::execute([':token' => $token]);
		return $res;
	}
}