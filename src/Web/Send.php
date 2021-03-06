<?php
/**
 *
 */

namespace Mvc5\Web;

use Mvc5\Http\Request;
use Mvc5\Http\Response;

final class Send
{
    /**
     *
     */
    use \Mvc5\Response\Service\Send;

    /**
     * @param Request $request
     * @param Response $response
     * @param callable $next
     * @return Response|mixed
     */
    function __invoke(Request $request, Response $response, callable $next)
    {
        return $next($request, $this->send($response));
    }
}
