<?php

declare(strict_types=1);

namespace App\Providers;

use App\config\Config;
use App\Routing\RouteRegistrar;
use App\Service\YamlParser;
use League\Container\ServiceProvider\AbstractServiceProvider;
use League\Container\ServiceProvider\BootableServiceProviderInterface;
use League\Route\Router;
use League\Route\Strategy\ApplicationStrategy;

class RouteServiceProvider extends AbstractServiceProvider implements BootableServiceProviderInterface
{
    public function register(): void
    {
        $container = $this->getContainer();
        $container->add(Router::class, function () {
            $route = new Router();

            $route->setStrategy(
                (new ApplicationStrategy())->setContainer($this->getContainer())
            );

            return $route;
        })
            ->setShared();

        $container->add(YamlParser::class)->setShared();
        $container->add(RouteRegistrar::class)
            ->addArgument($container->get(YamlParser::class))
            ->addArgument($container->get(Config::class))
            ->addArgument($container->get(Router::class))
            ->setShared();
    }

    public function boot(): void
    {
    }

    public function provides(string $id): bool
    {
        $services = [
            Router::class,
        ];

        return in_array($id, $services);
    }
}