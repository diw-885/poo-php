<?php

namespace CarTour;

class Autoloader
{
    public static function register()
    {
        spl_autoload_register([self::class, 'load']);
    }

    public static function load($class)
    {
        $path = str_replace('\\', '/', $class);
        $path = str_replace('CarTour', 'src', $path);

        require_once $path.'.php';
    }
}

Autoloader::register();
