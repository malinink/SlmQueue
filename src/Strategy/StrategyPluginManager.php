<?php

namespace SlmQueue\Strategy;

use SlmQueue\Exception\RuntimeException;
use Zend\ServiceManager\AbstractPluginManager;
use Zend\Mvc\Controller\Plugin\PluginInterface;
use SlmQueue\Controller\Plugin\Plugin;

/**
 * StrategyPluginManager
 */
class StrategyPluginManager extends AbstractPluginManager implements PluginInterface
{
    use Plugin;

    /**
     * @var bool
     */
    protected $shareByDefault = false;

    /**
     * {@inheritDoc}
     */
    public function validate($instance)
    {
        if ($instance instanceof AbstractStrategy) {
            return; // we're okay
        }

        throw new RuntimeException(sprintf(
            'Plugin of type %s is invalid; must extend SlmQueue\Strategy\AbstractStrategy',
            (is_object($instance) ? get_class($instance) : gettype($instance))
        ));
    }

    /**
     * {@inheritDoc}
     */
    public function validatePlugin($plugin)
    {
        return $this->validate($plugin);
    }
}

