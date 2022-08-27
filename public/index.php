<?php

/*
|--------------------------------------------------------------------------
| Load Configuration
|--------------------------------------------------------------------------
|
| Including configure file.
|
*/
if (file_exists(__DIR__."/../config/config.php")) {
    include __DIR__."/../config/config.php";
} else {
    echo "Configure file not found!";
}

/*
|--------------------------------------------------------------------------
| Load Models
|--------------------------------------------------------------------------
|
| Including configure file.
|
*/

// use App\Model\Database;
// use App\Model\Session;
use App\Model\Format;
use App\Trait\Singleton;

//$get_rand = Format::get_instance();
// $get_rand = Format::get_instance();

// echo $get_rand->random_token(10);








//  include DIR.'/public/web/inc/header.php';
 // include 'inc/banner.php';
 // include 'inc/about.php';
 // include 'inc/event.php';
 // include 'inc/ticket.php';
 // include 'inc/faq.php';
 // include 'inc/contact.php';
 // include 'inc/footer.php';

// echo TITLE;

// echo "index";

//print_r(__DIR__);

// print_r(dirname(__DIR__));









