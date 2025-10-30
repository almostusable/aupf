<?php

namespace App\View;

use App\config\Config;
use Psr\Container\ContainerInterface;
use Twig\Extension\AbstractExtension;

class TwigRuntimeExtension extends AbstractExtension
{
    public function __construct(
        private ContainerInterface $container,
    )
    {
    }

    public function config()
    {
        return $this->container->get(Config::class);
    }
}