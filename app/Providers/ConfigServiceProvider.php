<?php

declare(strict_types=1);

namespace App\Providers;

use App\config\Config;
use League\Container\ServiceProvider\AbstractServiceProvider;
use League\Container\ServiceProvider\BootableServiceProviderInterface;

class ConfigServiceProvider extends AbstractServiceProvider implements BootableServiceProviderInterface
{
    public function boot(): void
    {
        //
    }

    public function register(): void
    {
        $this->getContainer()->add(Config::class, function () {
            $config = new Config();

            $config->mergeConfigFromFiles($config);

            return $config->mergeConfigFromFiles($config);
        });
    }

    public function provides(string $id): bool
    {
        $services = [
            Config::class,
        ];

        return in_array($id, $services);
    }
}