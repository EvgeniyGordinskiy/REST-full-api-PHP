<?php
namespace App\versions\v1\auth\controllers;

use App\Services\Controller\BaseController;

class AuthController extends BaseController
{
	public function index (string $email = null, string $password = null)
	{
		$this->send([$email, $password]);
	}
}