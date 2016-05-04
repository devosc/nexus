<?php
/**
 *
 */

use Mvc5\Plugin\Config;
use Mvc5\Plugin\Dependency;
use Mvc5\Plugin\Hydrator;
use Mvc5\Plugin\Link;
use Mvc5\Plugin\Param;
use Mvc5\Plugin\Plug;
use Mvc5\Plugin\Plugin;
use Mvc5\Plugin\Response;
use Mvc5\Plugin\Service;

return [
    'config'                     => new Config,
    'controller\exception'       => new Response('controller\exception'),
    'error\handler'              => Mvc5\Request\Error\Handler::class,
    'error\controller'           => new Hydrator(Mvc5\Request\Error\Controller::class, ['setModel' => new Plugin('error\model')]),
    'error\layout'               => Mvc5\View\Template\Layout::class,
    'error\model'                => [Mvc5\Request\Error\Model::class, 'error/error'],
    'error\response'             => 'response\controller',
    'error\request'              => [Mvc5\Request\Error\Create::class, 'error', 'error\controller'],
    'error\status'               => Mvc5\Request\Error\Status::class,
    'error\view'                 => 'view\render',
    'event\model'                => Mvc5\Event::class,
    'exception\controller'       => [Mvc5\Controller\Exception::class, new Plugin('exception\model')],
    'exception\model'            => ['layout', 'error/exception'],
    'exception\response'         => 'response\controller',
    'exception\request'          => [Mvc5\Request\Exception\Create::class, 'exception', 'exception\route\controller'],
    'exception\route\controller' => [Mvc5\Request\Exception\Controller::class, new Plugin('exception\model')],
    'exception\status'           => ['response\status', 500],
    'exception\view'             => 'view\render',
    'factory'                    => new Service(null),
    'layout'                     => [Mvc5\Layout::class, 'layout'],
    'manager'                    => new Plugin(null),
    'middleware'                 => new Service(Mvc5\Middleware::class, [new Param('middleware')]),
    'mvc'                        => [Mvc5\Mvc::class, 'mvc', new Link],
    'mvc\controller'             => new Service(Mvc5\Mvc\Controller::class),
    'mvc\error'                  => new Service(Mvc5\Mvc\Error::class),
    'mvc\layout'                 => Mvc5\Mvc\Layout::class,
    'mvc\response'               => Mvc5\Mvc\Response::class,
    'mvc\route'                  => new Service(Mvc5\Mvc\Route::class),
    'mvc\view'                   => new Service(Mvc5\Mvc\View::class),
    'request'                    => new Dependency('request', new Plug('request\config')),
    'request\config'             => Mvc5\Request\Config::class,
    'resolver\exception'         => Mvc5\Resolver\Exception::class,
    'resolver\dispatch'          => Mvc5\Resolver\Dispatch::class,
    'response\controller'        => Mvc5\Response\Controller::class,
    'response'                   => Mvc5\Response\Config::class,
    'response\dispatch'          => [Mvc5\Response\Dispatch::class, 'response' => new Dependency('response')],
    'response\exception'         => new Response('response\exception', ['response' => new Plugin('response')]),
    'response\prepare'           => Mvc5\Response\Prepare::class,
    'response\send'              => Mvc5\Response\Send::class,
    'response\status'            => Mvc5\Response\Status::class,
    'route\generator'            => new Dependency('route\definition\generator'),
    'route\definition\generator' => Mvc5\Route\Generator::class,
    'route\dispatch'             => Mvc5\Route\Dispatch::class,
    'route\error'                => new Response('route\error'),
    'route\exception'            => new Response('route\exception'),
    'route\match'                => Mvc5\Route\Match::class,
    'route\match\action'         => Mvc5\Route\Match\Action::class,
    'route\match\host'           => Mvc5\Route\Match\Host::class,
    'route\match\path'           => Mvc5\Route\Match\Path::class,
    'route\match\method'         => Mvc5\Route\Match\Method::class,
    'route\match\scheme'         => Mvc5\Route\Match\Scheme::class,
    'route\match\wildcard'       => Mvc5\Route\Match\Wildcard::class,
    'router'                     => new Service(Mvc5\Route\Router::class, [new Param('routes')]),
    'service\resolver'           => new Dependency('resolver\dispatch'),
    'url'                        => new Dependency('url\plugin'),
    'url\generator'              => [Mvc5\Url\Generator::class, new Param('routes')],
    'url\plugin'                 => [Mvc5\Url\Plugin::class, new Dependency('request'), new Plugin('url\generator')],
    'view\exception'             => new Response('view\exception'),
    'view\render'                => Mvc5\View\Render::class,
    'view\renderer'              => new Service(Mvc5\View\Template\Renderer::class, [new Param('templates')]),
    'web'                        => new Response('web')
];
