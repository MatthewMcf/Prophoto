<?php

class Manager { 
    protected $_connection;

    const DBNAME = "proPhoto";
    const HOST = "localhost";
    const LOGIN = "root";
    const PWD = "";

    
    protected function __construct() // when we construct, we don't expect a 'return', because we're just instantiating a class
    {
        $this->_connection = new PDO('mysql:host='.self::HOST.';dbname='.self::DBNAME.';charset=utf8', self::LOGIN, self::PWD);
    }
}
