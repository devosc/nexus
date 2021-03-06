<?php
/**
 *
 */

namespace Mvc5\Config;

trait ModelObject
{
    /**
     *
     */
    use Count;
    use Iterator;

    /**
     * @var Model
     */
    protected Model $config;

    /**
     * @param array|Model $config
     */
    function __construct($config = [])
    {
        $this->config = $config instanceof Model ? $config : new \Mvc5\ArrayObject((array) $config);
    }

    /**
     *
     */
    function __clone()
    {
        $this->config = $this->config instanceof Scopable ? $this->config->withScope($this) : clone $this->config;
    }
}
