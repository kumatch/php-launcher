<?php

namespace Kumatch\Test;

use Kumatch\PropertyLauncher;
use Symfony\Component\DependencyInjection\Container;

class PropertyLauncherTest extends \PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
        parent::setUp();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    public function provideCallLauncherMethod()
    {
        return array(
            array('Request', 'request'),
            array('request', 'request'),
            array('FooBar', 'foo_bar'),
            array('fooBar', 'foo_bar'),
            array('MyApp_RegisterItem', 'my_app.register_item')
        );
    }

    /**
     * @test
     * @dataProvider provideCallLauncherMethod
     * @param $propertyName
     * @param $serviceName
     */
    public function throughGetService($propertyName, $serviceName)
    {
        $result = "OK";

        $container = $this->getMock('Symfony\Component\DependencyInjection\Container', array('get'));
        $container->expects($this->at(0))
            ->method('get')
            ->with($this->equalTo($serviceName))
            ->will($this->returnValue($result));

        /** @var Container $container */

        $launcher = new PropertyLauncher($container);

        $this->assertEquals($result, $launcher->$propertyName);
    }
}