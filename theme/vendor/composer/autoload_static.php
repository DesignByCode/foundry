<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitdcd277c21c45e09e09a57f22cdc7fc85
{
    public static $files = array (
        'b94c16cc40ce0561617da456efec870d' => __DIR__ . '/../..' . '/inc/Helpers/helpers.php',
    );

    public static $prefixLengthsPsr4 = array (
        'F' => 
        array (
            'Foundry\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Foundry\\' => 
        array (
            0 => __DIR__ . '/../..' . '/inc',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'Foundry\\Classes\\Functions' => __DIR__ . '/../..' . '/inc/Classes/Functions.php',
        'Foundry\\Classes\\Menu' => __DIR__ . '/../..' . '/inc/Classes/Menu.php',
        'Foundry\\Classes\\MetaBox' => __DIR__ . '/../..' . '/inc/Classes/MetaBox.php',
        'Foundry\\Classes\\StyleAndScripts' => __DIR__ . '/../..' . '/inc/Classes/StyleAndScripts.php',
        'Foundry\\Classes\\ThemeCustomizer' => __DIR__ . '/../..' . '/inc/Classes/ThemeCustomizer.php',
        'Foundry\\Classes\\ThemeSupport' => __DIR__ . '/../..' . '/inc/Classes/ThemeSupport.php',
        'Foundry\\Classes\\Woocommerce' => __DIR__ . '/../..' . '/inc/Classes/Woocommerce.php',
        'Foundry\\Traits\\Singleton' => __DIR__ . '/../..' . '/inc/Traits/Singleton.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitdcd277c21c45e09e09a57f22cdc7fc85::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitdcd277c21c45e09e09a57f22cdc7fc85::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitdcd277c21c45e09e09a57f22cdc7fc85::$classMap;

        }, null, ClassLoader::class);
    }
}
