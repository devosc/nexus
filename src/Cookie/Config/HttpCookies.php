<?php
/**
 *
 */

namespace Mvc5\Cookie\Config;

use Mvc5\Arg;
use Mvc5\Cookie\Cookies;

use function is_array;
use function is_string;
use function key;

trait HttpCookies
{
    /**
     * @var array
     */
    protected $config = [];

    /**
     * @param array $cookies
     */
    function __construct(array $cookies = [])
    {
        $this->config = $cookies;
    }

    /**
     * @return array
     */
    function all() : array
    {
        return $this->config;
    }

    /**
     * @param array|string $name
     * @param array $options
     */
    function remove($name, array $options = []) : void
    {
        !is_array($name) ? $this->set($name, '', [Arg::EXPIRES => 946706400] + $options) : $this->set(
            [Arg::VALUE => '', Arg::EXPIRES => 946706400] + (is_string(key($name)) ? $name : cookie(...$name))
        );
    }

    /**
     * @param array|string $name
     * @param string|null $value
     * @param array $options
     * @return mixed
     */
    function set($name, $value = null, array $options = [])
    {
        if (is_array($name)) {
            $this->config[name($name)] = is_string(key($name)) ? $name : cookie(...$name);
            return $name;
        }

        $this->config[$name] = [Arg::NAME => (string) $name, Arg::VALUE => (string) $value] + $options;

        return $value;
    }

    /**
     * @param array|string $name
     * @param string|null $value
     * @param array $options
     * @return self|mixed
     */
    function with($name, $value = null, array $options = []) : Cookies
    {
        $new = clone $this;
        $new->set($name, $value, $options);
        return $new;
    }

    /**
     * @param array|string $name
     * @param array $options
     * @return self|mixed
     */
    function without($name, array $options = []) : Cookies
    {
        $new = clone $this;
        $new->remove($name, $options);
        return $new;
    }
}

/**
 * @param string $name
 * @param string $value
 * @param int|string|null $expires
 * @param string|null $path
 * @param string|null $domain
 * @param bool|null $secure
 * @param bool|null $httponly
 * @param string|null $samesite
 * @return array
 */
function cookie(string $name, string $value, $expires = null, string $path = null, string $domain = null,
                bool $secure = null, bool $httponly = null, string $samesite = null) : array
{
    return [
        Arg::NAME => $name,
        Arg::VALUE => $value,
        Arg::EXPIRES => $expires,
        Arg::PATH => $path,
        Arg::DOMAIN => $domain,
        Arg::SECURE => $secure,
        Arg::HTTP_ONLY => $httponly,
        Arg::SAMESITE => $samesite
    ];
}

/**
 * @param $name
 * @return string
 */
function name($name) : string
{
    return (string) (is_array($name) ? (is_string(key($name)) ? $name[Arg::NAME] : $name[0]) : $name);
}
