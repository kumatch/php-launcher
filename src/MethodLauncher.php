<?php
namespace Kumatch;

/**
 * MethodLauncher
 */
class MethodLauncher extends AbstractLauncher
{
    public function __call($method, $arguments)
    {
        if (!preg_match('/^launch(.+)$/', $method, $matches)) {
            throw new \BadMethodCallException();
        }

        $name = $this->createServiceId($matches[1]);

        return $this->container->get($name);
    }

}