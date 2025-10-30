<?php

namespace App\View;

use Psr\Container\ContainerInterface;
use Twig\RuntimeLoader\RuntimeLoaderInterface;

class TwigRuntimeLoader implements RuntimeLoaderInterface
{

    public function __construct(
        private ContainerInterface $container,
    ) {
    }

    /**
     * @inheritDoc
     */
    public function load(string $class)
    {
        if ($class === TwigRuntimeExtension::class) {
            return new $class($this->container);
        }
    }
}