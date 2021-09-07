<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitda7d80ce6e19a349cd880cc59008ea03
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Pterobilling\\LaravelAddomipot\\' => 30,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Pterobilling\\LaravelAddomipot\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitda7d80ce6e19a349cd880cc59008ea03::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitda7d80ce6e19a349cd880cc59008ea03::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitda7d80ce6e19a349cd880cc59008ea03::$classMap;

        }, null, ClassLoader::class);
    }
}
