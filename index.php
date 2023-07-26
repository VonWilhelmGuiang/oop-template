<?php
$request = $_SERVER['REQUEST_URI'];

if(!str_contains($request, 'assets')){ //avoid errors for assets files
    $request = str_replace('app','',$request); //if accessing directly to app/views -> remove app
    $request = str_replace('.php','',$request); //if accessing directly to app/views -> remove .php file extension

    $request = explode('template',$request); 
    $request = explode('/',trim($request[1],'/'));

    //for class and function names
    $class = $request[0];
    $function = $request[1];

    //format for class parameters
    array_shift($request);
    array_shift($request);

    
    
        switch(strtoupper($class)){
            case 'PAGE':
            case 'VIEWS':
                require './app/views/'.($function).'.php';
            break;
            default:
                require './app/controllers/'.ucfirst($class).'.php';
                $class_call = new $class;
                $class_call->$function(...$request);
            break;
                
        }
   
}
