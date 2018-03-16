<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit6dc0ce4edc36edd83505fa1527dc4928
{
    public static $files = array (
        '3a37ebac017bc098e9a86b35401e7a68' => __DIR__ . '/..' . '/mongodb/mongodb/src/functions.php',
    );

    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'MongoDB\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'MongoDB\\' => 
        array (
            0 => __DIR__ . '/..' . '/mongodb/mongodb/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit6dc0ce4edc36edd83505fa1527dc4928::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit6dc0ce4edc36edd83505fa1527dc4928::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}