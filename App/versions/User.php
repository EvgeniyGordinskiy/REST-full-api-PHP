<?php
namespace App\v1;

use Services\DB;
use Services\Request;

class User
{
    private $request;

    public function __construct (){
        $this->request = new Request();
         if( strcasecmp($this->request->method,'GET') == 0){
             if(!$this->request->classMethod && isset($this->request->parameters['method1']) ){
                 $this->index($this->request->parameters['method1']);
             }
             if($this->request->classMethod){
                 $params = [];
                 if(isset($this->request->parameters['method2'])){
                     $params[] = $this->request->parameters['method2'];
                 }
                 dump($this->request);
                 call_user_func_array([$this, $this->request->classMethod],$params);
             }
         }

    }

    public function index($id=0){
        if(is_numeric($id)){
            $sql = "SELECT * FROM users WHERE id = ".$id;
            $result = (new DB())->get($sql);
            if($result){
                dump($result);
            }else{
               http_response_code(204);
            }

        }else{
            http_response_code(404);
        }
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