<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd2fe625ae3fb1f3c6b6206b73c34dc0e
{
    public static $files = array (
        '6e60481d8c04e99474e2ba7b3658ab5a' => __DIR__ . '/..' . '/php-activerecord/php-activerecord/ActiveRecord.php',
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInitd2fe625ae3fb1f3c6b6206b73c34dc0e::$classMap;

        }, null, ClassLoader::class);
    }
}
