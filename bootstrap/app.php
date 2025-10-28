<?php

declare(strict_types=1);

use App\config\Config;
use App\Core\App;
use App\Core\Container;
use App\Providers\ConfigServiceProvider;
use App\Routing\RouteRegistrar;
use Dotenv\Dotenv;
use League\Container\ReflectionContainer;

require __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$container = Container::getInstance();
$container->delegate(new ReflectionContainer());
$container->addServiceProvider(new ConfigServiceProvider());

$config = $container->get(Config::class);

foreach ($config->get('app.providers') as $provider) {
    $container->addServiceProvider(new $provider());
}
$routeRegistrar = $container->get(RouteRegistrar::class);

$app = new App($container);
$routeRegistrar->register();
$app->run();
