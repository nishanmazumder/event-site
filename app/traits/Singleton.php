<?php

namespace App\Trait;

/*
|--------------------------------------------------------------------------
| Singleton
|--------------------------------------------------------------------------
|
| Prevent to use more than one instance of a class.
|
*/

trait Singleton{
    public static $instance;

    // prevent direct construction
    public function __construct(){}

    // prevent cloning
    public function __clone() {}

    public static function get_instance(){
        $calss = static::class;
        if(!isset(self::$instance)){
            self::$instance = new $calss;
        }

        return self::$instance;
    }
}