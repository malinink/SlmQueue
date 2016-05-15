<?php

namespace SlmQueue\Controller\Plugin;

use Zend\Stdlib\DispatchableInterface as Dispatchable;
use Zend\ServiceManager\AbstractPluginManager;

trait Plugin
{
    /**
     *
     * @var Dispatchable 
     */
    protected $controller;

    /**
     * 
     * @return Dispatchable
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     * 
     * @param Dispatchable $controller
     * @return AbstractPluginManager
     */
    public function setController(Dispatchable $controller)
    {
        $this->controller = $controller;
        return $this;
    }
}
