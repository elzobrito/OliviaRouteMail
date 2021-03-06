<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0035c560a31421a7fa96dd388c1ccc1e
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
        'O' => 
        array (
            'OliviaRouterMail\\' => 17,
            'OliviaRouterMailLib\\' => 20,
            'OliviaDatabasePublico\\' => 22,
            'OliviaDatabaseModel\\' => 20,
            'OliviaDatabaseLibrary\\' => 22,
            'OliviaDatabaseConfig\\' => 21,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
        'OliviaRouterMail\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
        'OliviaRouterMailLib\\' => 
        array (
            0 => __DIR__ . '/../..' . '/lib',
        ),
        'OliviaDatabasePublico\\' => 
        array (
            0 => __DIR__ . '/..' . '/elzobrito/olivia-databaselibrary/public_html',
        ),
        'OliviaDatabaseModel\\' => 
        array (
            0 => __DIR__ . '/..' . '/elzobrito/olivia-databaselibrary/model',
        ),
        'OliviaDatabaseLibrary\\' => 
        array (
            0 => __DIR__ . '/..' . '/elzobrito/olivia-databaselibrary/src',
        ),
        'OliviaDatabaseConfig\\' => 
        array (
            0 => __DIR__ . '/..' . '/elzobrito/olivia-databaselibrary/config',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit0035c560a31421a7fa96dd388c1ccc1e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit0035c560a31421a7fa96dd388c1ccc1e::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit0035c560a31421a7fa96dd388c1ccc1e::$classMap;

        }, null, ClassLoader::class);
    }
}
