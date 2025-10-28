<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\config\Config;
use Laminas\Diactoros\Response;
use Psr\Http\Message\ServerRequestInterface;

class HomeController
{
    public function __construct(
        private Config $config,
    )
    {
    }

    public function __invoke(ServerRequestInterface $request): Response
    {
        $response = new Response();
        $response->getBody()->write(
            $this->config->get('app.name')
        );

        return $response;
    }
}