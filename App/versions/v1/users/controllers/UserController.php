<?php
namespace App\versions\v1\users\controllers;

use App\Services\Controller\BaseController;
use App\Services\Http\Response\Response;
use App\versions\v1\users\models\User;

class UserController extends BaseController
{
    private $request;

    /**
     * UserController constructor.
     */
    public function __construct ()
    {
    }

    /**
     * if id is false, get all clients, else get client by id.
     * @param integer $id
     */
    public function index(int $id = false)
    {
        if( !$id ) {
            $result = User::getClients();
        }
        $result = User::getClient($id);
        $this->send($result);
    }
    
}