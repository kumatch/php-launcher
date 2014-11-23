<?php
require_once '../vendor/autoload.php';
require_once './FooBar.php';

use Kumatch\Launcher;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

$container = new ContainerBuilder();
$loader = new YamlFileLoader($container, new FileLocator(__DIR__));
$loader->load('service.yml');

var_dump($container->get('foobar'));

$launcher = Launcher::createPropertyLauncher($container);

var_dump($launcher->Foobar);

$launcher = Launcher::createMethodLauncher($container);

var_dump($launcher->launchFoobar());
