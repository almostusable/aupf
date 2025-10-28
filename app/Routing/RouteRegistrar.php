<?php

namespace App\Routing;

use App\config\Config;
use App\Service\YamlParser;
use League\Route\Router;

class RouteRegistrar
{
    public function __construct(
        private readonly YamlParser $yamlParser,
        private readonly Config $config,
        private readonly Router $router,
    ) {
    }

    public function register(): void
    {
        $routes = $this->yamlParser->parse(
            $this->config->get('app.routes'),
        );

        foreach ($routes as $route) {
            $this->router->get($route["path"], $route["controller"]);
        }
    }
}