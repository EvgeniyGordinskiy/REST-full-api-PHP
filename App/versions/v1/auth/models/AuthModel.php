<?php
namespace App\versions\v1\auth\models;

use App\Services\Exceptions\AuthException;
use App\Services\JWTAuth\JWTAuth;
use App\Services\Model\Model;
use App\Services\DB\DB;

class AuthModel extends Model
{
	public static function register(string $name, string $email, string $password)
	{
		$sql = "select * from users where email = :email";
		DB::prepare($sql);
		$res = DB::select([':email' => $email]);

		if (!$res) {
			$private_key = JWTAuth::create_private_token();

			$sql = "insert into users (name, email, password, token) 
										values (:name , :email, :password, :private_key)";
			DB::prepare($sql);
			$res = DB::insert([
						':name' => $name, 
						':email' => $email, 
						':password' => $password , 
						':private_key' => $private_key
					]);
		} else {
			throw new AuthException('This email is already taken');
		}
		return $res;
	}
	
	public static function login(string $email, string $password)
	{
		$sql = "select name, email from users where email = :email and  password = :password";
		DB::prepare($sql);
		$user = DB::select([':email' => $email, ':password' => $password]);
			if($user) {
				$jwt = new JWTAuth($user);
				$private_token = $jwt->create_private_token();
				$public_token = $jwt->create_public_token($private_token);
				$token = $jwt->encode($private_token);
				if( self::updateUserToken($private_token, $email) ) {
					session_start();
					$_SESSION[$public_token] = ['token' => $token, 'exp' => 300000];
					$user['token'] = $public_token;
					return $user;
				}
			}else{
				throw new AuthException('Email or password is incorrect', 401);
			}
		return false;
	}

	public static function updateUserToken(string $token, string $email)
	{
		$sql = "update users set token = :token where email = :email";
		DB::prepare($sql);
		$res = DB::execute([':token' => $token, ':email' => $email]);
		return $res;
	}
}