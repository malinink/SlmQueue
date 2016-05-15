<?php

namespace SlmQueue\Queue;

use Zend\ServiceManager\AbstractPluginManager;
use Zend\Mvc\Controller\Plugin\PluginInterface;
use SlmQueue\Controller\Plugin\Plugin;

/**
 * QueuePluginManager
 */
class QueuePluginManager extends AbstractPluginManager implements PluginInterface
{
    use Plugin;

    /**
     * {@inheritDoc}
     */
    public function validate($instance)
    {
        if ($instance instanceof QueueInterface) {
            return; // we're okay!
        }

        throw new Exception\RuntimeException(sprintf(
            'Plugin of type %s is invalid; must implement SlmQueue\Queue\QueueInterface',
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
