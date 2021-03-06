<?php
/**
 *
 */

namespace Mvc5\Response;

use Mvc5\Event\Event;
use Mvc5\Event\EventModel;
use Mvc5\Http\Request;
use Mvc5\Http\Response;

use function array_filter;

use const Mvc5\{ BODY, CONTROLLER, EVENT, MODEL, REQUEST, RESPONSE };

final class Dispatch
    implements Event
{
    /**
     *
     */
    use EventModel;

    /**
     * @var Request
     */
    protected Request $request;

    /**
     * @var Response
     */
    protected Response $response;

    /**
     * @param string $event
     * @param Request|null $request
     * @param Response|null $response
     */
    function __construct(string $event, Request $request = null, Response $response = null)
    {
        $this->event = $event;
        $this->request = $request;
        $this->response = $response;
    }

    /**
     * @return array
     */
    protected function args() : array
    {
        return array_filter([
            CONTROLLER => $this->request[CONTROLLER],
            EVENT      => $this,
            MODEL      => $this->response[BODY],
            REQUEST    => $this->request,
            RESPONSE   => $this->response
        ]);
    }

    /**
     * @param callable $callable
     * @param array $args
     * @param callable|null $callback
     * @return mixed
     * @throws \Throwable
     */
    function __invoke(callable $callable, array $args = [], callable $callback = null)
    {
        $result = $this->signal($callable, $this->args() + $args, $callback);

        if ($result instanceof Request) {
            return $this->request = $result;
        }

        if ($result instanceof Response) {
            return $this->response = $result;
        }

        null !== $result &&
            $this->response = $this->response->with(BODY, $result);

        return $result;
    }
}
