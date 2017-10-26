<?php
namespace App\versions\v1\users\controllers;

use App\Services\Http\Response\Response;
use App\versions\v1\users\models\User;

class UserController
{
    private $request;

    public function __construct (){

    }

    public function index($id=false){
        $users = User::getClients();
        $response = new Response();
        $response->setStatusCode(200);
        $response->write($users);
        $response->send();
    }

    public function all(){
       
    }
}