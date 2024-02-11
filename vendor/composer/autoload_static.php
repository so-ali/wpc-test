<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite78dbfb464fc78ef8b39a895e67414d8
{
    public static $files = array (
        '0738a5984dc00d5d24d099e6de703dc1' => __DIR__ . '/../..' . '/includes/bootstrap.php',
    );

    public static $prefixLengthsPsr4 = array (
        'W' => 
        array (
            'WPC\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'WPC\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite78dbfb464fc78ef8b39a895e67414d8::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite78dbfb464fc78ef8b39a895e67414d8::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInite78dbfb464fc78ef8b39a895e67414d8::$classMap;

        }, null, ClassLoader::class);
    }
}
