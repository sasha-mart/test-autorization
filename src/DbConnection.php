<?php

namespace SashaMart\TestAutorization;

class DbConnection
{
    private static $_instance = null;
    private $conn;

    private function __construct()
    {
            require_once __DIR__.'/../config/db.php';

            $this->conn = new \mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        }

    public static function getInstance()
    {
        if(!self::$_instance)
        {
            self::$_instance = new self();
        }

        return self::$_instance;
    }

    public function getConnection()
    {
        return $this->conn;
    }

    private function __clone()
    {
    }
}