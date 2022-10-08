<?php

namespace App\Model;

/*
|--------------------------------------------------------------------------
| Load Auto Loader
|--------------------------------------------------------------------------
|
| Connection & Traits
|
*/

if (file_exists(__DIR__ . "/../../vendor/autoload.php")) {
    require_once __DIR__ . "/../../vendor/autoload.php";
} else {
    echo "Autoloader not found! - Database.php";
}

use Config\Connection;
use App\Model\Session;

// require_once '../config/config.php';

class UserLogin extends Connection
{

    public function __construct()
    {
        parent::__construct();
    }

    public function user_login($usermail, $userpass)
    {
        $sql = "SELECT * FROM nm_login WHERE useremail = '$usermail' and password = '$userpass'";

        try {
            $results = $this->connect->prepare($sql);
            $results->execute();
            $admin_info = $results->fetch(\PDO::FETCH_ASSOC);
        } catch (\PDOException $err) {
            exit("Error:" . $err->getMessage());
        }

        if ($usermail == $admin_info['useremail'] && $userpass == $admin_info['password']) {
            Session::init();
            Session::set("user_id", $admin_info['user_id']);
            Session::set("user_name", $admin_info['username']);
            Session::set("user_mail", $admin_info['useremail']);
            Session::set("user_role", $admin_info['userrole']);
            //$_SESSION['return_url'] = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        } else {
            header('Location: ' . BASE_URL . 'admin/public/index.php?login_error');
        }
    }

    public function user_logout()
    {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_name']);
        unset($_SESSION['user_mail']);
        unset($_SESSION['user_role']);
    }
}
