<?php

$database = require 'core/bootstrap.php';

session_start();
 

if(($_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"]) === HOST.PROJECT_FOLDER.'login/loginAction'){
// echo 'pasuje do loginAction';
    $router = new Router('http://' . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"], $collection);
    $router->run();
    $file = $router->getFile();
    $classController = $router->getClass();
    $method = $router->getMethod();
    require_once($file);
    $obj = new $classController();
    $obj->$method();
    
}else if(!Session::exist(CURRENT_USER_SESSION_NAME) && Cookie::exist(REMEMBER_ME_COOKIE_NAME)){
    UsersModel::loginUserFromCookie();
    echo "sprawdzam czy jest cookies i loguje";
    
    $router = new Router('http://' . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"], $collection);
    $router->run();
    $file = $router->getFile();
    $classController = $router->getClass();
    $method = $router->getMethod();
    require_once($file);
    $obj = new $classController();
    $obj->$method();

}else if(Session::exist(CURRENT_USER_SESSION_NAME)){    

    $router = new Router('http://' . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"], $collection);
    $router->run();
    $file = $router->getFile();
    $classController = $router->getClass();
    $method = $router->getMethod();
    require_once($file);
    $obj = new $classController();
    $obj->$method();

}else if(($_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"]) === HOST.PROJECT_FOLDER.'login'){    
    // przekierowujemy do strony z logowaniem

    $router = new Router(HTTP.HOST.PROJECT_FOLDER.'login', $collection);
    $router->run();
    $file = $router->getFile();
    $classController = $router->getClass();
    $method = $router->getMethod();
    require_once($file);
    $obj = new $classController();
    $obj->$method();

}else{
     
    // header('Location: '.HOST.'login');   
    header('Location: /login');   

}
    
