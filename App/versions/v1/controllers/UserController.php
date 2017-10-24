<?php
namespace App\versions\v1\controllers;

use \App\versions\v1\models\User;
use Services\DB;

class UserController
{
    private $request;

    public function __construct (){

    }

    public function index($id=false){
        $users = User::getClients();
	    return $users;
    }

    public function all(){
        dump(func_get_args());
        $sql = "SELECT * FROM users";
        $result = (new DB())->get($sql);
        if($result){
            dump($result);
        }
            http_response_code(204);
    }
}