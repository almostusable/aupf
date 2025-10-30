<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Laminas\Diactoros\Response;
use Psr\Http\Message\ServerRequestInterface;

class DashboardController extends BaseController
{
    public function __invoke(ServerRequestInterface $request): Response
    {
        return $this->render('Dashboard/dashboard.twig');
    }
}