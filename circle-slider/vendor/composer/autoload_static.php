<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb8a6833fe253870696287fbde8695677
{
    public static $files = array (
        'c0cc6a35dc0808cf1c53390824035e25' => __DIR__ . '/../..' . '/includes/functions.php',
    );

    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Circle\\Slider\\' => 14,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Circle\\Slider\\' => 
        array (
            0 => __DIR__ . '/../..' . '/includes',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb8a6833fe253870696287fbde8695677::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb8a6833fe253870696287fbde8695677::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}