<?php

namespace Kumatch\Test;

use Kumatch\Launcher;
use Symfony\Component\DependencyInjection\Container;

class LauncherTest extends \PHPUnit_Framework_TestCase
{
    /** @var  Container */
    protected $container;

    protected function setUp()
    {
        parent::setUp();

        $this->container = $this->getMock('Symfony\Component\DependencyInjection\Container');
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function createMethodLauncher()
    {
        $launcher = Launcher::createMethodLauncher($this->container);

        $this->assertInstanceOf('Kumatch\MethodLauncher', $launcher);
    }

    /**
     * @test
     */
    public function createPropertyLauncher()
    {
        $launcher = Launcher::createPropertyLauncher($this->container);

        $this->assertInstanceOf('Kumatch\PropertyLauncher', $launcher);
    }
}