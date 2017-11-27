<?php
/**
 *
 */

namespace Mvc5\Event;

use Mvc5\Signal;

trait Generator
{
    /**
     * @param mixed $listener
     * @return callable
     */
    protected abstract function callable($listener) : callable;

    /**
     * @param array|Event|\Iterator|object|string $event
     * @param callable $listener
     * @param array $args
     * @param callable|null $callback
     * @return mixed
     */
    protected function emit($event, callable $listener, array $args = [], callable $callback = null)
    {
        return $event instanceof Event ? $event($listener, $args, $callback) : $this->signal($listener, $args, $callback);
    }

    /**
     * @param array|Event|\Iterator|object|string $event
     * @param array $args
     * @param callable|null $callback
     * @return mixed
     */
    protected function generate($event, array $args = [], callable $callback = null)
    {
        return $this->traverse($event, $this->queue($event, $args), $args, $callback);
    }

    /**
     * @param array|Event|\Iterator|object|string $event
     * @param array|\Iterator $queue
     * @param array $args
     * @param callable $callback
     * @param mixed $result
     * @param callable $current
     * @return mixed
     */
    protected function iterate($event, $queue, array $args, callable $callback, $result, callable $current)
    {
        return $this->stopped($event, $queue) ? $result : $this->loop(
            $event, $queue, $args, $callback, $this->result($event, $current($queue), $args, $callback, $result)
        );
    }

    /**
     * @param array|Event|\Iterator|object|string $event
     * @param array|\Iterator $queue
     * @param array $args
     * @param callable $callback
     * @param mixed $result
     * @return mixed
     */
    protected function loop($event, &$queue, array $args, callable $callback, $result)
    {
        return $this->iterate($event, $queue, $args, $callback, $result, function(&$queue) {
            if ($queue instanceof \Iterator) {
                $queue->next();
                return $queue->current();
            }

            return next($queue);
        });
    }

    /**
     * @param array|Event|\Iterator|object|string $event
     * @param array $args
     * @return array|\Iterator
     */
    protected function queue($event, array $args = [])
    {
        return is_array($event) || $event instanceof \Iterator ? $event : $this->iterator($event, $args);
    }

    /**
     * @param array|Event|\Iterator|object|string $event
     * @param mixed $listener
     * @param array $args
     * @param callable|null $callback
     * @param mixed $result
     * @return mixed
     */
    protected function result($event, $listener, array $args = [], callable $callback = null, $result = null)
    {
        return !$listener ? $result : $this->emit($event, $this->callable($listener), $args, $callback);
    }

    /**
     * @param callable $callable
     * @param array $args
     * @param callable|null $callback
     * @return mixed
     */
    protected function signal(callable $callable, array $args = [], callable $callback = null)
    {
        return Signal::emit($callable, $args, $callback);
    }

    /**
     * @param array|\Iterator $queue
     * @return array|\Iterator
     */
    protected function start($queue)
    {
        $queue instanceof \Iterator ? $queue->rewind() : reset($queue);
        return $queue;
    }

    /**
     * @param Event|mixed $event
     * @param array|\Iterator $queue
     * @return bool
     */
    protected function stopped($event, $queue) : bool
    {
        return ($event instanceof Event && $event->stopped()) ||
            ($queue instanceof \Iterator ? !$queue->valid() : null === key($queue));
    }

    /**
     * @param array|Event|\Iterator|object|string $event
     * @param array|\Iterator $queue
     * @param array $args
     * @param callable $callback
     * @return mixed
     */
    protected function traverse($event, $queue, array $args, callable $callback)
    {
        return $this->iterate($event, $this->start($queue), $args, $callback, null, function($queue) {
            return $queue instanceof \Iterator ? $queue->current() : current($queue);
        });
    }
}
