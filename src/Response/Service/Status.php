<?php
/**
 *
 */

namespace Mvc5\Response\Service;

use Mvc5\Http\Error;
use Mvc5\Http\Request;
use Mvc5\Http\Response;
use Mvc5\Http\StatusCode;

use const Mvc5\{ ERROR, HTTP_OK, REASON, STATUS };

trait Status
{
    /**
     * @param Error $error
     * @param Response $response
     * @return Response
     */
    protected function error(Error $error, Response $response) : Response
    {
        return $response->with([
            STATUS => $error->status(),
            REASON => StatusCode::reasonPhrase($error->status())
        ]);
    }

    /**
     * @param Request $request
     * @param Response $response
     * @return Response
     */
    protected function status(Request $request, Response $response) : Response
    {
        if ($request[ERROR]) {
            return $this->error($request[ERROR], $response);
        }

        !$response->status() &&
            $response = $response->with(STATUS, HTTP_OK);

        /** @var Response $response */
        !$response->reason() &&
            $response = $response->with(REASON, StatusCode::reasonPhrase($response->status()));

        return $response;
    }

    /**
     * @param Request $request
     * @param Response $response
     * @return Response
     */
    function __invoke(Request $request, Response $response) : Response
    {
        return $this->status($request, $response);
    }
}
