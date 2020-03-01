<?php
/**
 *
 */

namespace Mvc5\Config;

trait Config
{
    /**
     *
     */
    use Count;
    use Iterator;
    use ArrayAccess;
    use PropertyAccess;

    /**
     * @param array|string $name
     * @return mixed
     */
    function get($name)
    {
        if (is_string($name)) {
            return $this->config[$name] ?? null;
        }

        $matched = [];

        foreach($name as $key) {
            $matched[$key] = $this->config[$key] ?? null;
        }

        return $matched;
    }

    /**
     * @param array|string $name
     * @return bool
     */
    function has($name) : bool
    {
        if (is_string($name)) {
            return isset($this->config[$name]);
        }

        foreach($name as $key) {
            if (!isset($this->config[$key])) {
                return false;
            }
        }

        return true;
    }

    /**
     * @param array|string $name
     */
    function remove($name) : void
    {
        foreach((array) $name as $key) {
            unset($this->config[$key]);
        }
    }

    /**
     * @param array|string $name
     * @param mixed $value
     * @return mixed
     */
    function set($name, $value = null)
    {
        if (is_string($name)) {
            return $this->config[$name] = $value;
        }

        foreach($name as $key => $value) {
            $this->config[$key] = $value;
        }

        return $name;
    }

    /**
     * @param array|string $name
     * @param mixed $value
     * @return self|mixed
     */
    function with($name, $value = null) : Model
    {
        $new = clone $this;
        
        $new->config instanceof Immutable 
                ? $new->config = $new->config->with($name, $value) 
                    : $new->set($name, $value);
        
        return $new;
    }

    /**
     * @param array|string $name
     * @return self|mixed
     */
    function without($name) : Model
    {
        $new = clone $this;
        
        $new->config instanceof Immutable 
                ? $new->config = $new->config->without($name) 
                    : $new->remove($name);
        
        return $new;
    }

    /**
     *
     */
    function __clone()
    {
        if (!is_object($this->config)) {
            return null;
        }

        if (!$this->config instanceof Scope) {
            return $this->config = clone $this->config;
        }

        $scope = $this->config->scope();

        if (!$scope instanceof self) {
            return $this->config = clone $this->config;
        }

        $this->config->scope(false);

        $clone = clone $this->config;
        $clone->scope($this);

        $this->config->scope($scope);

        return $this->config = $clone;
    }
}
