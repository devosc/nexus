<?php
/**
 *
 */

namespace Mvc5\Controller;

use Mvc5\Plugins\Service;

class Action
{
    /**
     *
     */
    use Service;

    /**
     * @param $controller
     * @param array $args
     * @return mixed
     */
    function __invoke($controller = null, array $args = [])
    {
        return $controller ? $this->call($controller, $args) : null;
    }
}
