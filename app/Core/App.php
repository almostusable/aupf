<?php

declare(strict_types=1);

namespace App\Core;

use Laminas\Diactoros\Request;
use Laminas\Diactoros\Response;
use Laminas\HttpHandlerRunner\Emitter\SapiEmitter;
use League\Route\Router;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ServerRequestInterface;

class App
{
    protected ServerRequestInterface $request;
    protected Router $router;

    public function __construct(ContainerInterface $container) {
        $this->request = $container->get(Request::class);
        $this->router = $container->get(Router::class);
    }

    public function run(): void
    {
        $response = new Response();
        try {
            $response = $this->router->dispatch($this->request);
        } catch (\Throwable $e) {
            throw $e;
        }

        new SapiEmitter()->emit($response);
    }

    public function getRequest(): ServerRequestInterface
    {
        return $this->request;
    }

    public function setRequest(ServerRequestInterface $request): void
    {
        $this->request = $request;
    }

    public function getRouter(): Router
    {
        return $this->router;
    }

    public function setRouter(Router $router): void
    {
        $this->router = $router;
    }
}