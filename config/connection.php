<?php

namespace App\Config;

/*
|--------------------------------------------------------------------------
| Configuration
|--------------------------------------------------------------------------
|
| Load configaration information
|
*/
if (file_exists(__DIR__."\config.php")) {
    require_once __DIR__."\config.php";
} else {
    echo "Configuration not found!";
}

/*
|--------------------------------------------------------------------------
| Connection
|--------------------------------------------------------------------------
|
| Connect to Database
|
*/
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

    public function test_data(){
        return $this->serverName;
    }
}

/*
|--------------------------------------------------------------------------
| DEBUG
|--------------------------------------------------------------------------
|
| Connection debug note
|
*/
// MYSQL Extension check
// if (!function_exists('mysqli_init') && !extension_loaded('mysqli')) {
//     echo 'Problem!';
// } else {
//     echo 'DONE!';
// }

