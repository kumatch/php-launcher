<?php
namespace Kumatch;

use Symfony\Component\DependencyInjection\Container;

/**
 * AbstractLauncher
 */
abstract class AbstractLauncher
{
    /** @var  Container */
    protected $container;

    /**
     * @param Container $container
     */
    public function __construct(Container $container = null)
    {
        if ($container) {
            $this->container = $container;
        }
    }

    /**
     * @return Container
     */
    public function getContainer()
    {
        return $this->container;
    }

    /**
     * @param Container $container
     * @return $this
     */
    public function setContainer(Container $container)
    {
        $this->container = $container;

        return $this;
    }

    /**
     * @param string $name
     * @return string
     */
    protected function createServiceId($name)
    {
        return Container::underscore($name);
    }

}