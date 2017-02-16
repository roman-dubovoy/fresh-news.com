<?php
require $_SERVER['DOCUMENT_ROOT'] . "/assets/settings.php";

class PDOConnection{
    private $_connection = null;
    private static $instance = null;

    private function __construct(){
        $this->_connection = new PDO(DSN, DB_USERNAME, DB_PASSWORD);
    }

    public static function getInstance(){
        if (is_null(self::$instance)){
            self::$instance = new PDOConnection();
        }
        return self::$instance;
    }

    public function getConnection(){
        return $this->_connection;
    }
}