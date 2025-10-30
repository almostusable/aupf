<?php

namespace App\View;

use Twig\Environment;

class View
{
    public function __construct(
        private Environment $twig
    ) {
    }

    public function render(string $template, array $data = []): string
    {
        return $this->twig->render($template, $data);
    }
}