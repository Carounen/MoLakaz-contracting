<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit774b0a6ce03e80616b2534bc2f298703
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit774b0a6ce03e80616b2534bc2f298703::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit774b0a6ce03e80616b2534bc2f298703::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit774b0a6ce03e80616b2534bc2f298703::$classMap;

        }, null, ClassLoader::class);
    }
}
