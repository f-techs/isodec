<?php

class DB {

    private static $_instance = null;
    private $_pdo,
            $_query,
            $_error = false,
            $_results,
            $_results2,
            $_count = 0,
            $_lastID;

    private function __construct() {
        try {
            $this->_pdo = new PDO('mysql:host=' . Config::get('mysql/host') . ';dbname=' . Config::get('mysql/db'), Config::get('mysql/username'), Config::get('mysql/password'));
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public static function getInstance() {
        if (!isset(self::$_instance)) {
            self::$_instance = new DB();
        }
        return self::$_instance;
    }

    public function gen_query($sql) {
        $this->_pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, TRUE);
        $this->_query = $this->_pdo->prepare($sql);
        if ($this->_query->execute()) {
            $this->_lastID = $this->_pdo->lastInsertId();
            return $this;
        }
    }
   


    public function select_query($sql) {
        $this->_query = $this->_pdo->prepare($sql);
        if ($this->_query->execute()) {
            $this->_results = $this->_query->fetchAll(PDO::FETCH_OBJ);
            $this->_pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->_count = $this->_query->rowCount();
        } else {
            return false;
        }
        return $this;
    }

    public function error() {
        return $this->_error;
    }

    public function count() {
        return $this->_count;
    }

    public function results() {
        return $this->_results;
    }

    public function lastID() {
        return $this->_lastID;
    }

    public function results2() {
        return $this->_results2;
    }

}
