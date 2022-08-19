<?php
define("DB_HOST", "localhost");
define("DB_USER", "bdsoftcr_nm_events");
define("DB_PASS", "f9WB~{sznIHM");
define("DB_NAME", "bdsoftcr_nmevents");

define("TITLE", "Event Site");
define("KEYWORD", "It's online events selling site");

global $base_url;
$base_url="http://".$_SERVER['SERVER_NAME'].dirname($_SERVER["REQUEST_URI"].'?');

class Connection {

    private $host_name = DB_HOST;
    private $user_name = DB_USER;
    private $dbPassword = DB_PASS;
    private $dbName = DB_NAME;
    
    protected $db_connect;

    public function __construct() {
        $this->db_connect = mysqli_connect($this->host_name, $this->user_name, $this->dbPassword, $this->dbName);

        if (!$this->db_connect) {
            die('Connection Failed' . mysqli_error($this->db_connect));
        }
    }

}
