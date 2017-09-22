<?php

namespace app\Application;

use app\Service\ServiceLocator;

abstract class AbstractController
{
    /**
     * @var ServiceLocator
     */
    protected $serviceLocator;

    /**
     * AbstractController constructor.
     * @param ServiceLocator $serviceLocator
     */
    public function __construct(ServiceLocator $serviceLocator)
    {
        $this->serviceLocator = $serviceLocator;
    }
}