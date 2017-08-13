<?php
/**
 *
 */

namespace Mvc5\Service;

trait Middleware
{
    /**
     * @var Service
     */
    protected $service;

    /**
     * @var array|\Iterator
     */
    protected $stack;

    /**
     * @param Service $service
     * @param array|\Iterator $stack
     */
    function __construct(Service $service, $stack = [])
    {
        $this->service = $service;
        $this->stack = $stack;
    }

    /**
     * @param array $args
     * @return array
     */
    protected function args(array $args)
    {
        $args[] = $this->callable();
        return $args;
    }

    /**
     * @param $middleware
     * @param array $args
     * @return mixed
     */
    protected function call($middleware, $args)
    {
        return $this->service->call($middleware, $this->args($args));
    }

    /**
     * @return \Closure
     */
    protected function callable()
    {
        return function(...$args) {
            return ($middleware = $this->next($this->stack)) ? $this->call($middleware, $args) : $this->end($args);
        };
    }

    /**
     * @param array $args
     * @return mixed|null
     */
    protected function end(array $args)
    {
        return $args ? end($args) : null;
    }

    /**
     * @param array|\Iterator $stack
     * @return mixed
     */
    protected function next(&$stack)
    {
        if (is_array($stack)) {
            return next($stack);
        }

        $stack->next();

        return $stack->current();
    }

    /**
     * @param array|\Iterator $stack
     * @return mixed
     */
    protected function reset(&$stack)
    {
        if (is_array($stack)) {
            return reset($stack);
        }

        $stack->rewind();

        return $stack->current();
    }

    /**
     * @param array ...$args
     * @return mixed
     */
    function __invoke(...$args)
    {
        return $this->stack ? $this->call($this->reset($this->stack), $args) : $this->end($args);
    }
}