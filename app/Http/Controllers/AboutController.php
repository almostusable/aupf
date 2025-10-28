<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\config\Config;
use Laminas\Diactoros\Response;
use Psr\Http\Message\ServerRequestInterface;

class AboutController
{
    public function __invoke(ServerRequestInterface $request): Response
    {
        $response = new Response();
        $response->getBody()->write('About');

        return $response;
    }
}