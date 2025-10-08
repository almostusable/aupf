<?php

declare(strict_types=1);

namespace App\Providers;

use App\Core\Example;
use App\Core\View;
use League\Container\ServiceProvider\AbstractServiceProvider;
use League\Container\ServiceProvider\BootableServiceProviderInterface;
use Spatie\Ignition\Ignition;

class AppServiceProvider extends AbstractServiceProvider implements BootableServiceProviderInterface
{
    public function boot(): void
    {
        if (env('APP_DEBUG') === true) {
            Ignition::make()->register();
        }
    }

    public function register(): void
    {
//        $this->getContainer()->add(Example::class, function () {
//            return new Example();
//        });
    }

    public function provides(string $id): bool
    {
        $services = [
//            Example::class,
        ];

        return in_array($id, $services);
    }
}