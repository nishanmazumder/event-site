<?php

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
| Define Site Root
|--------------------------------------------------------------------------
|
| Define structural variable
|
*/
define("DIR", dirname(__DIR__));

/*
|--------------------------------------------------------------------------
| Define Base URL
|--------------------------------------------------------------------------
|
| Define structural variable
|
*/

//$base_url="http://".$_SERVER['SERVER_NAME'].dirname($_SERVER["REQUEST_URI"].'?');
define("BASE_URL", "http://events.test/");

// global $base_url;
// $base_url = "http://events.test/";
// // $base_url = "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer
|
*/

// if (file_exists(DIR . "/vendor/autoload.php")) {
//     require_once DIR . "/vendor/autoload.php";
// } else {
//     echo "Autoloader not found!";
// }

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
