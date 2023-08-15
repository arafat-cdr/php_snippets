<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit298c61f5b33ba77c0bc121ea6f4b852d
{
    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'Shuchkin\\SimpleXLSX' => __DIR__ . '/..' . '/shuchkin/simplexlsx/src/SimpleXLSX.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit298c61f5b33ba77c0bc121ea6f4b852d::$classMap;

        }, null, ClassLoader::class);
    }
}