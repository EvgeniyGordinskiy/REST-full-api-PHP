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
			$jwt = new JWTAuth();
		}
		$this->send([]);
	}
}