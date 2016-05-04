<?php
/**
 *
 */

namespace Mvc5\Request\Error;

use Mvc5\Response\Error;
use Mvc5\Response\Error\NotFound;

class Handler
{
    /**
     * @param Error $error
     * @return mixed
     */
    function __invoke(Error $error = null)
    {
        return $error ?: new NotFound;
    }
}