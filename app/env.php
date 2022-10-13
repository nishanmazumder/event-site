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
| Meta
|--------------------------------------------------------------------------
|
| Define site meta information
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
