<?php
return[
 'auth' => function(){
          return (new \App\Services\Permissions\Auth())->check();
    }
];