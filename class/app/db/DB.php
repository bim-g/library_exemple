<?php

namespace Wepesi\App\Core;
use \PDOException;
use \PDO;
use \FFI\Exception;
    class DB
    {
        private static $_instance = null;
        private $_pdo,
            $_query,
            $_error,
            $_results = false,
            $_lastid,
            $_count = 0;

        private function __construct()
        {
            try {
                $this->_pdo = new PDO("mysql:host=" . Config::get('mysql/host') . ";dbname=" . Config::get('mysql/db'), Config::get('mysql/username'), Config::get('mysql/password'));
                $this->_pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $ex) {
                die($ex->getMessage());
            }
        }
        static function getInstance(){
            if(!isset(self::$_instance)){
                self::$_instance=new DB();
            }
            return self::$_instance;
        }
        private function queryOperation($table, $actions)
        {
            if (strlen($table) < 1) {
                throw new Exception("table name should be a string");
            }
            $_get = new QueryParams($this->_pdo, $table, $actions);
            $this->_query = $_get;
            return $_get;
        }
        // select module
        function get(string $table)
        {
            if (strlen($table) < 1) {
                throw new Exception("table name should be a string");
            }
            $_get = new DBSelect($this->_pdo, $table);
            $this->_query = $_get;
            return $_get;
        }
        // insert module
        function insert(string $table)
        {
            return $this->queryOperation($table, "insert");
        }
        // delete module
        function delete(string $table)
        {
            return $this->queryOperation($table, "delete");
        }
        // return the last id
        function lastId()
        {
            return $this->_query->lastId();
        }
        // return an error status when an error occure while doing an querry
        function error()
        {
            $this->_query->error();
        }
    }
