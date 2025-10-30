<?php

declare(strict_types=1);

namespace App\Providers;

use App\View\TwigExtension;
use App\View\TwigRuntimeLoader;
use App\View\View;
use League\Container\ServiceProvider\AbstractServiceProvider;
use League\Container\ServiceProvider\BootableServiceProviderInterface;
use Twig\Environment;
use Twig\Extension\DebugExtension;
use Twig\Loader\FilesystemLoader;

class ViewServiceProvider extends AbstractServiceProvider implements BootableServiceProviderInterface
{
    public function boot(): void
    {
    }

    public function register(): void
    {
        $this->getContainer()->add(View::class, function () {
            $loader = new FilesystemLoader(__DIR__ . '/../../templates');
            $debug = env('APP_DEBUG');
            $twig = new Environment($loader, [
                'cache' => false,
                'debug' => $debug,
            ]);
            $twig->addRuntimeLoader(new TwigRuntimeLoader($this->container));
            $twig->addExtension(new TwigExtension());
            $twig->addExtension(new DebugExtension());

            return new View($twig);
        });
    }

    public function provides(string $id): bool
    {
        $services = [
            View::class,
        ];

        return in_array($id, $services);
    }
}