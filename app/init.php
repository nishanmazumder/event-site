<?php

/*
|--------------------------------------------------------------------------
| Define Site Root
|--------------------------------------------------------------------------
|
| Define structural variable
|
*/
define("DIR", dirname(__DIR__));

/*
|--------------------------------------------------------------------------
| Load Auto Loader
|--------------------------------------------------------------------------
|
| Composer
|
*/

if (file_exists(DIR . "/vendor/autoload.php")) {
    require_once DIR . "/vendor/autoload.php";
} else {
    echo "Autoloader not found! " . basename(__FILE__);
}

/*
|--------------------------------------------------------------------------
| Global information
|--------------------------------------------------------------------------
|
| Define site information
|
*/
define("TITLE", "Event Site");
define("KEYWORD", "It's online events selling site");

/*
|--------------------------------------------------------------------------
| Define Base URL
|--------------------------------------------------------------------------
|
| Define structural variable
|
*/

define("BASE_URL", "http://events.test/"); // Local Development
// define("BASE_URL", "https://".$_SERVER['SERVER_NAME'].dirname($_SERVER["REQUEST_URI"].'?'));


/*
|--------------------------------------------------------------------------
| Database information
|--------------------------------------------------------------------------
|
| Define Database Value
|
*/
define("DB_HOST", "localhost");
define("DB_NAME", "events");
define("DB_USER", "root");
define("DB_PASS", "");

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