<?php
namespace Kumatch;

use Symfony\Component\DependencyInjection\Container;

class Launcher
{
    /**
     * @param Container $container
     * @return MethodLauncher
     */
    public static function createMethodLauncher(Container $container)
    {
        return new MethodLauncher($container);
    }

    /**
     * @param Container $container
     * @return PropertyLauncher
     */
    public static function createPropertyLauncher(Container $container)
    {
        return new PropertyLauncher($container);
    }
}