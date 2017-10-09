<?php
namespace App\Services\Http\Request;

class Request{
    public $headers = [];
    public $forsmat = "json";
    public $parameters = [];
    public $method = [];
    public $classMethod;
    public $class;
    public $version = "v1";


   public function  __construct()
   {
       $parameters = array();
       // first of all, pull the GET vars
       if (isset($_SERVER['QUERY_STRING'])) {
           $parameters = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
       }
       
       if (isset($parameters[0])) {
           $this->version = $parameters[0];
           if (isset($parameters[1])) {
               $this->class = ucfirst($parameters[1]);
           }

           if (isset($parameters[2])) {
               if (intval($parameters[2]) === 0) {
                   $this->classMethod = $parameters[2];
               } else {
                   $this->parameters['method1'] = $parameters[2];
               }
           }
           if (isset($parameters[3]) && !isset($parameters[4])) {
                   $this->parameters['method2'] = $parameters[3];
           }

           if (isset($parameters[4])) {
               if (isset($parameters[4])) {
                   $this->parameters['method2'] = $parameters[4];
               }
           }
           
           if (isset($parameters[5])) {
               http_response_code(404);
                exit();
           }

           $this->method = $_SERVER['REQUEST_METHOD'];

           $this->parameters['get'] = $_GET;
       }
   }


}