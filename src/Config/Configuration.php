<?php
/**
 *
 */

namespace Mvc5\Config;

interface Configuration
    extends Model
{
    /**
     * @param array|string $name
     */
    function remove($name) : void;

    /**
     * @param array|string $name
     * @param mixed $value
     * @return mixed
     */
    function set($name, $value = null);
}
