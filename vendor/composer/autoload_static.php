<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit463cb689c82a2efc7674cd5f28517972
{
    public static $files = array (
        '42e3dc2cf7383276e8c418f14b63f194' => __DIR__ . '/../..' . '/config/config.php',
        '1d9583397feb05003dc403f496a39d95' => __DIR__ . '/../..' . '/lib/Database.php',
        'f17f348f84af1e8f433787a20b295dff' => __DIR__ . '/../..' . '/lib/Session.php',
        '7dcd73e50b0b008e4de27c9451b88bc3' => __DIR__ . '/../..' . '/helpers/formate.php',
    );

    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Stripe\\' => 7,
        ),
        'F' => 
        array (
            'Faker\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Stripe\\' => 
        array (
            0 => __DIR__ . '/..' . '/stripe/stripe-php/lib',
        ),
        'Faker\\' => 
        array (
            0 => __DIR__ . '/..' . '/fzaninotto/faker/src/Faker',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit463cb689c82a2efc7674cd5f28517972::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit463cb689c82a2efc7674cd5f28517972::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
