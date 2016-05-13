<?php
/**
 *
 */

namespace Mvc5\Config;

interface Configuration
    extends Object
{
    /**
     * @param string $name
     * @return void
     */
    function remove($name);

    /**
     * @param string $name
     * @param mixed $value
     * @return mixed
     */
    function set($name, $value);
}
