<?php

namespace app\Service;

use app\Service\Exception\ServiceNotFoundException;

/**
 * Class ServiceLocator.
 */
class ServiceLocator
{
    /**
     * @var array
     */
    private $services = [];

    public function set($name, $service)
    {
        $this->services[$name] = $service;
    }

    public function get($name)
    {
        if (!array_key_exists($name, $this->services)) {
            throw new ServiceNotFoundException(sprintf('Could not find service %s', $name));
        }

        return $this->services[$name];
    }
}