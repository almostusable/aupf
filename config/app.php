<?php

declare(strict_types=1);

use App\Providers\AppServiceProvider;
use App\Providers\RequestServiceProvider;
use App\Providers\RouteServiceProvider;

return [
    'providers' => [
        AppServiceProvider::class,
        RequestServiceProvider::class,
        RouteServiceProvider::class
    ]
];