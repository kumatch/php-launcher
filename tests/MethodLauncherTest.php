<?php

namespace Kumatch\Test;

use Kumatch\MethodLauncher;
use Symfony\Component\DependencyInjection\Container;

class MethodLauncherTest extends \PHPUnit_Framework_TestCase
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
            array('launchRequest', 'request'),
            array('launchFooBar', 'foo_bar'),
            array('launchMyApp_RegisterItem', 'my_app.register_item')
        );
    }

    /**
     * @test
     * @dataProvider provideCallLauncherMethod
     * @param $methodName
     * @param $serviceName
     */
    public function throughGetService($methodName, $serviceName)
    {
        $result = "OK";

        $container = $this->getMock('Symfony\Component\DependencyInjection\Container', array('get'));
        $container->expects($this->at(0))
            ->method('get')
            ->with($this->equalTo($serviceName))
            ->will($this->returnValue($result));

        /** @var Container $container */

        $launcher = new MethodLauncher($container);

        $this->assertEquals($result, call_user_func(array($launcher, $methodName)));
    }
}