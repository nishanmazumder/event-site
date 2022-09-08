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
	echo "Autoloader not found!";
}

/*
|--------------------------------------------------------------------------
| Load Models
|--------------------------------------------------------------------------
|
| Load all essential classes...
|
*/

// use App\Model\Database;
// use App\Model\Session;
// use App\Model\Format;
// use App\Trait\Singleton;

// $get_rand = Format::get_instance();
// $get_rand = new Format();
// $get_rand = Format::get_instance();

// echo $get_rand->random_token(10);

use App\Model\Database;
use App\Model\Session;
use App\Model\Format;


$db = new Database();
$fm = new Format();

Session::init();
$userName = Session::get('user');
$userId = Session::get('userId');
$userRole = Session::get('userRole');

// echo $userName;






 include DIR.'/public/web/inc/header.php';
//  //include DIR.'/public/web/inc/banner.php';
//  include DIR.'/public/web/inc/about.php';
//  include DIR.'/public/web/inc/event.php';
//  include DIR.'/public/web/inc/ticket.php';
//  include DIR.'/public/web/inc/faq.php';
//  include DIR.'/public/web/inc/contact.php';
 include DIR.'/public/web/inc/footer.php';








