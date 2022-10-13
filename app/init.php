<?php

/*
|--------------------------------------------------------------------------
| Load Auto Loader
|--------------------------------------------------------------------------
|
| Composer
|
*/

if (file_exists(__DIR__ . "/../vendor/autoload.php")) {
    require_once __DIR__ . "/../vendor/autoload.php";
} else {
    echo "Autoloader not found! " . basename(__FILE__);
}

/*
|--------------------------------------------------------------------------
| Load Models
|--------------------------------------------------------------------------
|
| Load all essential classes
|
*/

use App\Model\Database;
use App\Model\Format;
use App\Model\Session;
use App\Model\UserLogin;

$db = new Database();
$fm = new Format();

// WEB
Session::init();
$userName = Session::get('user');
$userId = Session::get('userId');
$userRole = Session::get('userRole');

if (isset($_POST['nm_customer_logout'])) {
    Session::destroy();
    header('Location: ' . BASE_URL . '/public/web/login.php?login=login');
    exit;
}

//Admin
// Session::init();

$userId = Session::get('user_id');
$userName = Session::get('user_name');
$userRole = Session::get('user_role');

if (isset($_GET['action']) && $_GET['action'] == 'logout') {
    $login = new UserLogin();
    $login->user_logout();

    header('Location:' . BASE_URL . 'admin');
    exit;
}

ob_start();

function send_session_data($username, $userId, $userRole)
{
    Session::set('login', TRUE);
    Session::set("user", $username);
    Session::set("userId", $userId);
    Session::set("userRole", $userRole);
}
