<?php
/**
 *
 */

namespace Mvc5\Plugin;

use Mvc5\Arg;

class Plugin
    implements Gem\Plugin
{
    /**
     *
     */
    use Config\Plugin;

    /**
     * @param null|string $name
     * @param array $args
     * @param array $calls
     * @param null|string $param
     * @param bool|false $merge
     */
    function __construct(string $name = null, array $args = [], array $calls = [], string $param = null, bool $merge = false)
    {
        $this->config = [
            Arg::ARGS  => $args,
            Arg::CALLS => $calls,
            Arg::NAME  => $name,
            Arg::PARAM => $param ?? Arg::ITEM,
            Arg::MERGE => $merge
        ];
    }
}
