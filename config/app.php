<?php

declare(strict_types=1);

use App\Providers\AppServiceProvider;

return [
    'name' => env('APP_NAME', 'Aupf'),
    'debug' => env('APP_DEBUG', false),

    'providers' => [
        AppServiceProvider::class
    ]
];