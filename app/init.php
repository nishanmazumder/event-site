<?php

/*
|--------------------------------------------------------------------------
| Load Auto Loader
|--------------------------------------------------------------------------
|
| Composer
|
*/

if (file_exists(__DIR__. "/../vendor/autoload.php")) {
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

$db = new Database();
$fm = new Format();

// Session::init();
$userName = Session::get('user');
$userId = Session::get('userId');
$userRole = Session::get('userRole');

if (isset($_POST['nm_customer_logout'])) {
    Session::destroy();
    header('Location: login.php?login=login');
    exit;
}

ob_start();