<?php
/**
 *
 */
namespace Mvc5\Response\Emitter;

use Mvc5\Response\Emitter;

use function passthru;

final class PassThru
    implements Emitter
{
    /**
     * @var string
     */
    protected string $command;

    /**
     * @param string $command
     */
    function __construct(string $command)
    {
        $this->command = $command;
    }

    /**
     *
     */
    function emit() : void
    {
        passthru($this->command);
    }
}
