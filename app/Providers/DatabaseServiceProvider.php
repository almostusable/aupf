<?php

declare(strict_types=1);

namespace App\Providers;

use App\config\Config;
use App\Database\DatabaseConnection;
use Doctrine\DBAL\DriverManager;
use League\Container\ServiceProvider\AbstractServiceProvider;
use League\Container\ServiceProvider\BootableServiceProviderInterface;

class DatabaseServiceProvider extends AbstractServiceProvider implements BootableServiceProviderInterface
{
    public function boot(): void
    {
        //
    }

    public function register(): void
    {
        $config = $this->getContainer()->get(Config::class);
        $this->getContainer()->add(DatabaseConnection::class, function () use ($config) {

            $driver = $config->get('database.driver');
            $connectionParams = [
                'dbname' => $config->get("database.$driver.database"),
                'user' => $config->get("database.$driver.username"),
                'password' => $config->get("database.$driver.password"),
                'host' => $config->get("database.$driver.host"),
                'driver' => $driver,
            ];
            $conn = DriverManager::getConnection($connectionParams);

            return new DatabaseConnection($conn);
        });
    }

    public function provides(string $id): bool
    {
        $services = [
            DatabaseConnection::class,
        ];

        return in_array($id, $services);
    }
}