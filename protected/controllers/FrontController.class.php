<?php
class FrontController{
    private $_controller = null;
    private $_action = null;
    private $_params = [];
    private $_body = null;
    private static $instance;

    private function __construct(){
        $requestURI = $_SERVER['REQUEST_URI'];
        $uriParts = [];
        if (strpos($requestURI, "?")){
            $uriParts = explode("/", trim(substr($requestURI, 0, strpos($requestURI, "?")), "/"));
            $requestGetParam = explode("=",substr($requestURI, strpos($requestURI, "?") + 1, strlen($requestURI) - 1));
            $this->_params[$requestGetParam[0]] = $requestGetParam[1];
        }
        else
            $uriParts = explode("/", trim($requestURI, "/"));
        //Controller
        $this->_controller = !empty($uriParts[0]) ? ucfirst($uriParts[0]) . "Controller" : "NewsController";
        //Action
        $this->_action = !empty($uriParts[1]) ? $uriParts[1] . "Action" : "indexAction";
        //Params
        if (!empty($uriParts[2])){
            for ($i = 2; $i < count($uriParts); $i++){
                $this->_params[] = $uriParts[$i];
            }
        }
        if (empty($this->_params))
            $this->_params['page'] = 1;
    }

    public static function getInstance(){
        if (is_null(self::$instance)){
            self::$instance = new FrontController();
        }
        return self::$instance;
    }

    public function route(){
        if (class_exists($this->_controller)){
            $refClass = new ReflectionClass($this->_controller);
            if ($refClass->hasMethod($this->_action)){
                $controller = $refClass->newInstance();
                $method = $refClass->getMethod($this->_action);
                if (!empty($this->_params))
                    $method->invoke($controller, $this->_params);
                else
                    $method->invoke($controller);
            }
        }
    }

    public function __get($name){
        switch ($name){
            case "_controller": return $this->_controller; break;
            case "_action": return $this->_action; break;
            case "_params": return $this->_params; break;
            case "_body": return $this->body; break;
            default: break;
        }
    }

    public function __set($name, $value){
        if ($name == '_body')
            $this->_body = $value;
    }
}