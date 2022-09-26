<?php

class UserLogin
{
    protected $host_name = 'localhost';
    protected $dbName = 'events';
    protected $user_name = 'root';
    protected $dbPassword = '';
    protected $db_connect;

    public function __construct()
    {
        try {
            $this->db_connect = new \PDO("mysql:host=" . $this->host_name . ";dbname=" . $this->dbName, $this->user_name, $this->dbPassword);
            $this->db_connect->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $err) {
            exit("Error: " . $err->getMessage());
        }
    }

    public function user_login($data)
    {
        $user_password = md5($data['user_pass']);
        $sql = "SELECT * FROM nm_login WHERE user_email = '$data[user_mail]' and user_pass = '$user_password'";

        try {
            $results = $this->db_connect->prepare($sql);
            $results->execute();
            $admin_info = $results->fetch(\PDO::FETCH_ASSOC);
        } catch (\PDOException $err) {
            exit("Error:". $err->getMessage());
        }

        if ($admin_info == true) {
            session_start();
            $_SESSION['user_id'] = $admin_info['user_id'];
            $_SESSION['user_name'] = $admin_info['user_name'];

            header('Location: admin-panel.php');
        } else {
            header('Location: index.php');
        }
    }

    public function user_logout()
    {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_name']);

        header('Location: index.php');
    }
}
