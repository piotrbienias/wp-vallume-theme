<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit14e7ac78b8d655cad1f19fe29aea6fe5
{
    public static $files = array (
        '841f98c5d948ce534a6f87abe5b50614' => __DIR__ . '/..' . '/roots/wp-password-bcrypt/wp-password-bcrypt.php',
    );

    public static $prefixLengthsPsr4 = array (
        'D' => 
        array (
            'Dotenv\\' => 7,
        ),
        'C' => 
        array (
            'Composer\\Installers\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Dotenv\\' => 
        array (
            0 => __DIR__ . '/..' . '/vlucas/phpdotenv/src',
        ),
        'Composer\\Installers\\' => 
        array (
            0 => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers',
        ),
    );

    public static $prefixesPsr0 = array (
        'j' => 
        array (
            'johnpbloch\\Composer\\' => 
            array (
                0 => __DIR__ . '/..' . '/johnpbloch/wordpress-core-installer/src',
            ),
        ),
        'E' => 
        array (
            'Env' => 
            array (
                0 => __DIR__ . '/..' . '/oscarotero/env/src',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit14e7ac78b8d655cad1f19fe29aea6fe5::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit14e7ac78b8d655cad1f19fe29aea6fe5::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit14e7ac78b8d655cad1f19fe29aea6fe5::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
