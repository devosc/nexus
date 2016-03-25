<?php
/**
 *
 */

namespace Mvc5\Route\Match;

use Mvc5\Arg;
use Mvc5\Route\Definition;
use Mvc5\Route\Route;

class Method
{
    /**
     * @param Route $route
     * @param Definition $definition
     * @return Route
     */
    public function __invoke(Route $route, Definition $definition)
    {
        if (!$definition->methods()) {
            return $route;
        }

        ($controller = $definition->method($route->method())) &&
            $route[Arg::CONTROLLER] = $controller;

        return $route;
    }
}
