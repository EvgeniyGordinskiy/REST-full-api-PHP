<?php
namespace App\versions\v1\auth\controllers;

use App\Services\Controller\BaseController;
use App\Services\JWTAuth\JWTAuth;
use App\versions\v1\auth\models\AuthModel;

class AuthController extends BaseController
{
	public function index (string $email, string $password)
	{
		if ($user = AuthModel::checkUser($email, $password)) {
			$jwt = new JWTAuth($user);
			$private_token = $jwt->create_private_token();
			$public_token = $jwt->create_public_token($private_token);
			if (AuthModel::updateUserToken($private_token)) {
				$this->send(['token' => $public_token]);
			} else {
				$this->sendWithError();
			}
		}
		$this->sendWithError(401);
	}


	public function post (string $email, string $password)
	{
		$user = AuthModel::checkUser($email, $password);
		if ($user = AuthModel::checkUser($email, $password)) {
			$jwt = new JWTAuth($user);
			$token = $jwt->encode();
			$this->send(['token' => $token]);
		}
		$this->sendWithError(401);
	}
}