<?php

namespace App\Model;

class Session{
    public static function init(){
        session_start();
    }

    public static function set($key, $value){
        $_SESSION[$key] = $value;
    }

    public static function get($key){
        if(isset($_SESSION[$key])){
            return $_SESSION[$key];
        } else {
            return FALSE;
        }
    }

    public static function checkSession(){
        self::init();
        if(self::get('login')== FALSE){
            self::destroy();
        }
    }

    public static function loginCheck(){
        self::init();
        if(self::get('login')== TRUE){
            header("Location: index.php");
            exit;
        }
    }

    public static function destroy(){
        session_destroy();
    }

    public function __construct()
    {
        echo "Session!";
    }
}

