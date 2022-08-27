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

global $base_url;
//$base_url="http://".$_SERVER['SERVER_NAME'].dirname($_SERVER["REQUEST_URI"].'?');
$base_url = "http://events.test/";

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer
|
*/

if (file_exists(DIR . "/vendor/autoload.php")) {
    require_once DIR . "/vendor/autoload.php";
} else {
    echo "Autoloader not found!";
}

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
