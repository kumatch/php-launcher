<?php
namespace Kumatch;

/**
 * MethodLauncher
 */
class PropertyLauncher extends AbstractLauncher
{
    public function __get($name)
    {
        return $this->container->get( $this->createServiceId($name) );
    }

}