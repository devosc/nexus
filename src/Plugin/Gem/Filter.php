<?php
/**
 *
 */

namespace Mvc5\Plugin\Gem;

use Mvc5\Resolvable;

interface Filter
    extends Resolvable
{
    /**
     * @return array
     */
    function args();

    /**
     * @return Plugin|string
     */
    function config();

    /**
     * @return string|array
     */
    function filter();

    /**
     * @return string
     */
    function param();
}
