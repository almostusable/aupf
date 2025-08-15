<?php

declare(strict_types=1);

use App\Core\App;
use Spatie\Ignition\Ignition;

Ignition::make()->register();

$app = new App();
$app->run();
