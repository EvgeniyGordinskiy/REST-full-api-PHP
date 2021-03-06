<?php
namespace App\versions\v1\auth\controllers;

use App\Services\Controller\BaseController;
use App\Services\JWTAuth\JWTAuth;
use App\versions\v1\auth\models\AuthModel;

class AuthController extends BaseController
{
	public function index (string $email, string $password)
	{
		if ($user = AuthModel::login($email, $password)) {
				$this->send(['user' => $user]);
		}
		$this->sendWithError(401);
	}

	/**
	 *  Register new user
	 * 
	 * @param string $name
	 * @param string $email
	 * @param string $password
	 */
	public function post (string $name, string $email, string $password)
	{
		$register = AuthModel::register($name, $email, $password);
		if ($register) {
			$user = $this->index($email, $password);
			$this->send($user);
		}
		$this->sendWithError(401);
	}
}