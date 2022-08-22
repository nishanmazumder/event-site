<?php

namespace App\Config;

// Get configaration data
include __DIR__."\config.php";

class Connection {
    protected $connect;
    protected $serverName = DB_HOST;
    protected $dbName = DB_NAME;
    protected $user = DB_USER;
    protected $password = DB_PASS;

    public function __construct() {
        try {
            $this->connect = new \PDO('mysql:host=' . $this->serverName . ';dbname=' . $this->dbName, $this->user, $this->password);
            $this->connect->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $err) {
            exit('Error:' . $err->getMessage());
        }
    }
}

