<?php
error_reporting(1);
session_start();
function __autoload($class_name){
    //class' directories
    $directories = array(
        $_SERVER['DOCUMENT_ROOT'].'/protected/controllers/',
        $_SERVER['DOCUMENT_ROOT'].'/protected/views/',
        $_SERVER['DOCUMENT_ROOT'].'/protected/models/',
        $_SERVER['DOCUMENT_ROOT'].'/protected/library/'
        //$_SERVER['DOCUMENT_ROOT'].'/protected/library/exceptions/'
    );

    foreach($directories as $directory){
        if(file_exists($directory.$class_name . '.class.php')) {
            require_once($directory . $class_name . '.class.php');
            return;
        }
    }
}

try{
    $frontController = FrontController::getInstance();
    $frontController->route();
    //Убрать?
    if (!empty($frontController->_body))
        echo $frontController->_body;
}catch (Exception $e){
    echo $e->getMessage();
}