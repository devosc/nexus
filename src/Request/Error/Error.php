<?php
/**
 *
 */

namespace Mvc5\Request\Error;

use Mvc5\Arg;
use Mvc5\Http\Request;

trait Error
{
    /**
     * @var mixed
     */
    protected $controller;

    /**
     * @var string
     */
    protected $name;

    /**
     * @param string $name
     * @param mixed $controller
     */
    function __construct(string $name, $controller)
    {
        $this->controller = $controller;
        $this->name       = $name;
    }

    /**
     * @param Request $request
     * @return Request
     */
    protected function request(Request $request)
    {
        return !$request[Arg::ERROR] ? $request :
            $request->with([Arg::CONTROLLER => $this->controller, Arg::NAME => $this->name]);
    }

    /**
     * @param Request $request
     * @return Request
     */
    function __invoke(Request $request)
    {
        return $this->request($request);
    }
}
