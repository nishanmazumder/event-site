<?php

namespace App\Model;

use Config\Connection;

// require_once '../config/config.php';

class UserLogin extends Connection {

    // public function __construct() {
    //     parent::__construct();
    // }

    public function user_login($usermail, $userpass) {

        // $usermail = mysqli_real_escape_string($this->db_connect, $usermail);
        // $userpass = mysqli_real_escape_string($this->db_connect, $userpass);

        // $sql = "SELECT * FROM nm_login WHERE useremail = '$usermail' and password = '$userpass'";

        // $sql_query_result = mysqli_query($this->db_connect, $sql);
        // $admin_info = mysqli_fetch_assoc($sql_query_result);

        $user_password = md5($userpass);
        $sql = "SELECT * FROM nm_login WHERE user_email = '$usermail' and user_pass = '$user_password'";

        try {
            $results = $this->db_connect->prepare($sql);
            $results->execute();
            $admin_info = $results->fetch(\PDO::FETCH_ASSOC);
        } catch (\PDOException $err) {
            exit("Error:". $err->getMessage());
        }

        if ($usermail == $admin_info['useremail'] && $userpass == $admin_info['password']) {
            //return $login_error = "done";
            session_start();

            $_SESSION['user_id'] = $admin_info['user_id'];
            $_SESSION['user_name'] = $admin_info['username'];
            $_SESSION['user_mail'] = $admin_info['useremail'];
            $_SESSION['user_role'] = $admin_info['userrole'];

            //$_SESSION['return_url'] = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

            header('Location: admin.php');
            //exit();
            //echo "<script>window.location='admin.php';</script>";
        } else {
            header('Location: index.php?login_error');
        }
    }

    public function user_logout() {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_name']);
        unset($_SESSION['user_mail']);
        unset($_SESSION['user_role']);

        header('Location: index.php');
    }

}

?>