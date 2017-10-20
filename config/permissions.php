<?php
return[
 'auth' => function(){
          return (new \App\Services\Permissions\Auth())->check();
    },
 'admin' => function(){
          return (new \App\Services\Permissions\Admin())->check();
    }
];