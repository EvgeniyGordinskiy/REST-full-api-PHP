<?php
return[
 'auth' => function(){
          return (new \App\Services\Permissions\Auth());
    },
 'admin' => function(){
          return (new \App\Services\Permissions\Admin());
    }
];