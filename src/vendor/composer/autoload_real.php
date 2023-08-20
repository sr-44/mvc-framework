<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit02b9ff7748a2a6430fcbf34fa8a58508
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInit02b9ff7748a2a6430fcbf34fa8a58508', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit02b9ff7748a2a6430fcbf34fa8a58508', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit02b9ff7748a2a6430fcbf34fa8a58508::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
