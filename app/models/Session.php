<?php

namespace App;

class Session{
    static function init(){
        session_start();
    }

    static function set($key, $value){
        $_SESSION[$key] = $value;
    }

    static function get($key){
        if(isset($_SESSION[$key])){
            return $_SESSION[$key];
        } else {
            return FALSE;
        }
    }

    static function checkSession(){
        self::init();
        if(self::get('login')== FALSE){
            self::destroy();
            header("Location: login.php");
        }
    }

    static function loginCheck(){
        self::init();
        if(self::get('login')== TRUE){
            header("Location: index.php");
        }
    }

    static function destroy(){
        session_destroy();
        header("Location: login.php");
    }





}

