<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\View\View;
use Laminas\Diactoros\Response;

class BaseController
{
    public function __construct(
        private View $view,
    ) {
    }

    protected function render(
        string $template,
        array $data = []
    ): Response
    {
        $response = new Response();
        $response->getBody()->write(
            $this->view->render($template, $data)
        );

        return $response;
    }
}