<?php

declare(strict_types=1);

namespace App\Providers;

use League\Container\ServiceProvider\AbstractServiceProvider;
use League\Container\ServiceProvider\BootableServiceProviderInterface;
use League\Route\Router;
use League\Route\Strategy\ApplicationStrategy;

class RouteServiceProvider extends AbstractServiceProvider implements BootableServiceProviderInterface
{
    public function boot(): void
    {
    }

    public function register(): void
    {
        $this->getContainer()->add(Router::class, function () {
            $route = new Router();

            $route->setStrategy(
                new ApplicationStrategy()->setContainer($this->getContainer())
            );

            return $route;
        })
            ->setShared();
    }

    public function provides(string $id): bool
    {
        $services = [
            Router::class,
        ];

        return in_array($id, $services);
    }
}