<?php
/**
 *
 */

namespace Mvc5;

use function array_key_exists;
use function array_values;
use function explode;
use function get_class;
use function is_array;
use function is_string;
use function key;

final class Signal
{
    /**
     * @param callable $callable
     * @param array $args
     * @param callable|null $callback
     * @return mixed
     * @throws \Throwable
     */
    static function emit(callable $callable, array $args = [], callable $callback = null)
    {
        if ($args && !is_string(key($args))) {
            return $callable(...$args);
        }

        $function = null;
        $matched  = [];
        $method   = '__invoke';
        $params   = [];

        if (is_string($callable)) {
            $static = explode('::', $callable);
            if (isset($static[1])) {
                list($callable, $method) = $static;
            } else {
                $params   = (new \ReflectionFunction($callable))->getParameters();
                $function = $callable;
            }
        }

        is_array($callable) && list($callable, $method) = $callable;

        !$function && ($function = [$callable, $method])
            && $params = (new \ReflectionMethod($callable, $method))->getParameters();

        foreach($params as $param) {
            if ($param->isVariadic()) {
                $matched = [
                    ...$matched, ...(ARGV === $param->name ? [new Plugin\SignalArgs($args)] : array_values($args))
                ];
                break;
            }

            if (array_key_exists($param->name, $args)) {
                $matched[] = $args[$param->name];
                unset($args[$param->name]);
                continue;
            }

            if (ARGV === $param->name) {
                $matched[] = $args;
                break;
            }

            if ($param->isOptional()) {
                $param->isDefaultValueAvailable() &&
                    $matched[] = $param->getDefaultValue();
                continue;
            }

            if ($callback && null !== $match = $callback($param->name)) {
                $matched[] = $match;
                continue;
            }

            if ($callback && $hint = (string) $param->getType()) {
                $matched[] = $callback($hint);
                continue;
            }

            Exception::runtime('Missing required parameter $' . $param->name . ' for ' . (
                is_string($function) ? $function : (
                    (is_string($callable) ? $callable : get_class($callable)) . '::' . $method
                )
            ));
        }

        return $function(...($params ? $matched : array_values($args)));
    }
}
