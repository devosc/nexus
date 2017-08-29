<?php
/**
 *
 */

namespace Mvc5\Resolver;

trait Container
{
    /**
     * @var array|mixed
     */
    protected $config = [];

    /**
     * @var array|\Iterator|mixed
     */
    protected $container = [];

    /**
     * @var array|mixed
     */
    protected $services = [];

    /**
    * @return array|mixed
     */
    function config()
    {
        return $this->config;
    }

    /**
     * @param string $name
     * @return mixed
     */
    protected function configured(string $name)
    {
        return $this->services[$name] ?? null;
    }

    /**
     * @return array|\Iterator|mixed
     */
    function container()
    {
        return $this->container;
    }

    /**
     * @return int
     */
    function count()
    {
        return count($this->container);
    }

    /**
     * @return mixed
     */
    function current()
    {
        return $this->container instanceof \Iterator ? $this->container->current() : current($this->container);
    }

    /**
     * @param string $name
     * @return mixed
     */
    function get($name)
    {
        return $this->stored($name) ?? $this($name);
    }

    /**
     * @param string $name
     * @return bool
     */
    function has($name)
    {
        return isset($this->container[$name]) || isset($this->services[$name]);
    }

    /**
     * @return mixed
     */
    function key()
    {
        return $this->container instanceof \Iterator ? $this->container->key() : key($this->container);
    }

    /**
     * @return void
     */
    function next()
    {
        $this->container instanceof \Iterator ? $this->container->next() : next($this->container);
    }

    /**
     * @param array|string $name
     * @return void
     */
    function remove($name)
    {
        foreach((array) $name as $key) {
            unset($this->container[$key]);
        }
    }

    /**
     * @return void
     */
    function rewind()
    {
        $this->container instanceof \Iterator ? $this->container->rewind() : reset($this->container);
    }

    /**
     * @return array|mixed
     */
    function services()
    {
        return $this->services;
    }

    /**
     * @param array|string $name
     * @param mixed $value
     * @return mixed
     */
    function set($name, $value = null)
    {
        if (is_string($name)) {
            return $this->container[$name] = $value;
        }

        foreach($name as $key => $value) {
            $this->container[$key] = $value;
        }

        return $name;
    }

    /**
     * @param string $name
     * @param callable|null|object $service
     * @return callable|null|object
     */
    protected function share(string $name, $service = null)
    {
        null !== $service
            && $this->set($name, $service);

        return $service;
    }

    /**
     * @param string $name
     * @param null $plugin
     * @return callable|mixed|null|object
     */
    function shared(string $name, $plugin = null)
    {
        return $this->stored($name) ?? $this->share($name, $this->plugin($plugin ?? $name));
    }

    /**
     * @param string $name
     * @return mixed
     */
    protected function stored(string $name)
    {
        return $this->container[$name] ?? null;
    }

    /**
     * @return bool
     */
    function valid()
    {
        return $this->container instanceof \Iterator ? $this->container->valid() : null !== key($this->container);
    }

    /**
     * @param $plugin
     * @param array $args
     * @return array|callable|null|object|string
     */
    abstract function __invoke($plugin, array $args = []);
}
