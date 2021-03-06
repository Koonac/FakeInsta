<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit05f9b1e8d570001a42f92d18ba1ad0de
{
    public static $files = array (
        '6f826cf7b3f29cf8b68db5a5d7974932' => __DIR__ . '/../..' . '/source/Config.php',
    );

    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Source\\' => 7,
        ),
        'C' => 
        array (
            'CoffeeCode\\Router\\' => 18,
            'CoffeeCode\\DataLayer\\' => 21,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Source\\' => 
        array (
            0 => __DIR__ . '/../..' . '/source',
        ),
        'CoffeeCode\\Router\\' => 
        array (
            0 => __DIR__ . '/..' . '/coffeecode/router/src',
        ),
        'CoffeeCode\\DataLayer\\' => 
        array (
            0 => __DIR__ . '/..' . '/coffeecode/datalayer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit05f9b1e8d570001a42f92d18ba1ad0de::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit05f9b1e8d570001a42f92d18ba1ad0de::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit05f9b1e8d570001a42f92d18ba1ad0de::$classMap;

        }, null, ClassLoader::class);
    }
}
