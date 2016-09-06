<?php
/**
 *
 */

namespace Mvc5\Session\Config;

use Mvc5\Config\Overload;
use Mvc5\Model\Config;
use Mvc5\Session\Session as _Session;

trait Container
{
    /**
     *
     */
    use Overload;

    /**
     * @var string
     */
    protected $label = self::class;

    /**
     * @var _Session
     */
    protected $session;

    /**
     * @param _Session $session
     * @param string $label
     */
    function __construct(_Session $session, $label = null)
    {
        $label && $this->label = $label;

        $this->session = $session;

        !isset($this->session[$this->label]) &&
            $this->reset();

        !$this->config &&
            $this->config = $this->session[$this->label];
    }

    /**
     *
     */
    function close()
    {
        return $this->session->close();
    }

    /**
     * @param bool|true $cookie
     */
    function destroy($cookie = true)
    {
        $this->session->destroy($cookie);
    }

    /**
     * @return string
     */
    function id()
    {
        return $this->session->id();
    }

    /**
     * @return string
     */
    function label()
    {
        return $this->label;
    }

    /**
     * @return string
     */
    function name()
    {
        return $this->session->name();
    }

    /**
     * @param bool|false $delete_old_session
     */
    function regenerate($delete_old_session = false)
    {
        $this->session->regenerate($delete_old_session);
    }

    /**
     *
     */
    function reset()
    {
        return $this->session[$this->label] = $this->config = new Config;
    }

    /**
     * @return int
     */
    function status()
    {
        return $this->session->status();
    }

    /**
     * @param string $name
     * @param mixed $config
     * @return self|mixed
     */
    function with($name, $config)
    {
        $this->set($name, $config);
        return $this;
    }

    /**
     * @param string $name
     * @return self|mixed
     */
    function without($name)
    {
        $this->remove($name);
        return $this;
    }
}