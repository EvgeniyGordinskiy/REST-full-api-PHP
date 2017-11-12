<?php
namespace App\versions\v1\users\controllers;

use App\Services\Controller\BaseController;
use App\Services\Http\Response\Response;
use App\versions\v1\users\models\User;

class UserController extends BaseController
{
    private $request;

    public function __construct ()
    {

    }

    public function index($id = false)
    {
        $users = User::getClients();
        $this->send($users);

    }

    public function all()
    {
       
    }
}