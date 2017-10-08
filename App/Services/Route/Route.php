<?php
namespace App\Services;
class Route{
    private $requestClass;
    
    public function __construct()
    {
         $request = new Request();
        if(isset($request->class)) {
            if (file_exists("App/".$request->version."/".$request->class . ".php")) {
            $newClass = "App\\".$request->version."\\".$request->class;
             new $newClass();
            }else{
              http_response_code(404);
            }
        }else{
            http_response_code(404);
        }
    }
}